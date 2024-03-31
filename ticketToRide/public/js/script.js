const socket = new WebSocket('ws://localhost:3000');
const messageContainer = document.getElementById('message-container');
const messageForm = document.getElementById('send-container');
const messageInput = document.getElementById('message-input');

// const name = prompt('Entrez votre pseudo');
const name = document.getElementById('utilisateur').getAttribute('data-nom');
console.log(name); // Le nom de l'utilisateur connecté
// appendMessage('Vous avez rejoint le groupe'); ceci fait doublons

// Événement de connexion WebSocket
socket.onopen = () => {
    // Envoyer le nom de l'utilisateur au serveur lors de la connexion
    socket.send(JSON.stringify({ type: 'new-user', name: name }));
};

// Événement de réception de message WebSocket
socket.onmessage = event => {
    const data = JSON.parse(event.data);
    switch (data.type) {
        case 'chat-message':
            appendMessage(`${data.name}: ${data.message}`);
            break;
        case 'user-connected':
            appendMessage(`${data.name} a rejoint le groupe`);
            break;
        case 'user-disconnected':
            appendMessage(`${data.name} a quitté le groupe`);
            break;
        default:
            console.log("Unknown message type");
    }
};

// Événement de fermeture de connexion WebSocket
socket.onclose = () => {
    appendMessage('Vous avez quitté le groupe');
};

// Événement de soumission du formulaire
messageForm.addEventListener('submit', e => {
    e.preventDefault();
    const message = messageInput.value;
    // appendMessage(`Vous : ${message}`); ceci fait doublons
    // Envoyer le message au serveur
    socket.send(JSON.stringify({ type: 'send-chat-message', message: message }));
    messageInput.value = '';
});

function appendMessage(message) {
    const messageElement = document.createElement('div');
    messageElement.innerText = message;
    messageContainer.append(messageElement);
}

// Fonction pour envoyer un message WebSocket lorsque le bouton est cliqué
function handleButtonClick(buttonId) {
    // Envoyer un message WebSocket au serveur avec l'identifiant du bouton
    socket.send(JSON.stringify({ type: 'button-clicked', buttonId: buttonId }));
}
