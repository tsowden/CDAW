const socket = new WebSocket('ws://localhost:3000');

// Écoute des événements de connexion, de réception de messages, etc.
socket.addEventListener('open', function (event) {
    console.log('Connected to WebSocket server');
});

socket.addEventListener('message', function (event) {
    console.log('Message from server:', event.data);
    // Traitez ici les messages reçus du serveur WebSocket
});

socket.addEventListener('close', function (event) {
    console.log('Disconnected from WebSocket server');
});

// Écoute des soumissions de formulaire pour envoyer des messages
document.getElementById('send-container').addEventListener('submit', function (event) {
    event.preventDefault();
    const messageInput = document.getElementById('message-input');
    const message = messageInput.value.trim();
    if (message) {
        socket.send(message);
        messageInput.value = '';
    }
});