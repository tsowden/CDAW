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
            appendMessage(`${data.name} a rejoint la partie`);
            if (!participants.includes(data.name)) { // Ajouter l'utilisateur à la liste des participants s'il n'est pas déjà présent
                participants.push(data.name);
            }
            console.log(participants);
            break;
        case 'user-disconnected':
            appendMessage(`${data.name} a quitté la partie`);
            const index = participants.indexOf(data.name);
            if (index !== -1) {
                participants.splice(index, 1); // Retirer l'utilisateur de la liste des participants s'il est bien dedans
            }
            console.log(participants);
            break;
        case 'user-click':
            // Répondre au clic utilisateur, par exemple, changer la couleur du trajet
            onClickButton(data.buttonId, data.userName);
            const routeName = data.buttonId.split("-").slice(1).join("-"); //utilise pour afficher le nom du trajet sans "milieu"
            appendMessage(`${data.userName} a pris la route ${routeName}`);
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
    scrollToBottom();
}

function scrollToBottom() {
    var messageContainer = document.getElementById("message-container");
    messageContainer.scrollTop = messageContainer.scrollHeight;
}

// Fonction pour envoyer un message WebSocket lorsque le bouton est cliqué
function handleButtonClick(buttonId) {
    // Récupérer le nom de l'utilisateur pour pouvoir écrire dans le chat qui a cliqué
    const userName = document.getElementById('utilisateur').getAttribute('data-nom');

    // Envoyer un message WebSocket au serveur avec l'identifiant du bouton et le nom de l'utilisateur
    socket.send(JSON.stringify({ type: 'button-clicked', buttonId: buttonId, userName: userName }));
}

