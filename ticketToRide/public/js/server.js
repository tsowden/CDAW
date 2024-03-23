const WebSocket = require('ws');

const wss = new WebSocket.Server({ port: 3000 });

const users = {};

wss.on('connection', ws => {
    // Gérer l'événement "message"
    ws.on('message', message => {
        const data = JSON.parse(message);
        switch (data.type) {
            case 'new-user':
                // Enregistrer le nouvel utilisateur
                users[ws.connectionId] = data.name;
                // Diffuser à tous les utilisateurs connectés que quelqu'un s'est connecté
                broadcast({
                    type: 'user-connected',
                    name: data.name
                });
                break;
            case 'send-chat-message':
                // Diffuser le message du chat à tous les utilisateurs connectés
                broadcast({
                    type: 'chat-message',
                    message: data.message,
                    name: users[ws.connectionId]
                });
                break;
            case 'disconnect':
                // Diffuser à tous les utilisateurs connectés que quelqu'un s'est déconnecté
                broadcast({
                    type: 'user-disconnected',
                    name: users[ws.connectionId]
                });
                // Supprimer l'utilisateur de la liste des utilisateurs
                delete users[ws.connectionId];
                break;
            default:
                console.log("Unknown message type");
        }
    });

    // Gérer l'événement "close"
    ws.on('close', () => {
        // Effectuer la même logique que pour la déconnexion
        if (users[ws.connectionId]) {
            broadcast({
                type: 'user-disconnected',
                name: users[ws.connectionId]
            });
            delete users[ws.connectionId];
        }
    });

    // Générer un identifiant unique pour cette connexion WebSocket
    ws.connectionId = generateUniqueId();
});

// Fonction pour diffuser des messages à tous les clients
function broadcast(message) {
    wss.clients.forEach(client => {
        if (client.readyState === WebSocket.OPEN) {
            client.send(JSON.stringify(message));
        }
    });
}

// Fonction pour générer un identifiant unique
function generateUniqueId() {
    return Math.random().toString(36).substring(2) + Date.now().toString(36);
}
