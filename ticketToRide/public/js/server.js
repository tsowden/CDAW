const WebSocket = require('ws');

const wss = new WebSocket.Server({ port: 3000 });

const users = {}; // Structure de données pour stocker les noms des utilisateurs associés à leurs identifiants de connexion

wss.on('connection', function connection(ws) {
    console.log('Connected to WebSocket server');

    ws.on('message', function incoming(message) {
        console.log('Received message:', message);
        try {
            const data = JSON.parse(message);
            if (data.type === 'new-user') {
                users[ws.id] = data.name; // Associer le nom de l'utilisateur à son identifiant de connexion
                console.log(`${data.name} has joined the group`);
                console.log(users);
            } else if (data.type === 'send-chat-message') {
                console.log(`Message from ${users[ws.id]}: ${data.message}`);
                // Broadcast the message to all clients
                wss.clients.forEach(function each(client) {
                    if (client !== ws && client.readyState === WebSocket.OPEN) {
                        client.send(JSON.stringify({ type: 'chat-message', name: users[ws.id], message: data.message }));
                    }
                });
            }
        } catch (error) {
            console.error('Error parsing JSON:', error);
        }
    });

    ws.on('close', function close() {
        console.log('Disconnected from WebSocket server');
        if (users[ws.id]) {
            const disconnectedUserName = users[ws.id];
            delete users[ws.id]; // Supprimer l'utilisateur de la structure de données lorsqu'il se déconnecte
            // Informer les autres utilisateurs que cet utilisateur s'est déconnecté
            wss.clients.forEach(function each(client) {
                if (client !== ws && client.readyState === WebSocket.OPEN) {
                    client.send(JSON.stringify({ type: 'user-disconnected', name: disconnectedUserName }));
                }
            });
        }
    });
});
