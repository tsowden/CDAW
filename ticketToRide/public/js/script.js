const socket = new WebSocket('ws://localhost:3000');
const messageContainer = document.getElementById('message-container');
const messageForm = document.getElementById('send-container');
const messageInput = document.getElementById('message-input');

const name = prompt('Entrez votre pseudo');
appendMessage('Vous avez rejoint le groupe');

socket.onopen = () => {
    socket.send(JSON.stringify({ type: 'new-user', name: name }));
};

socket.onclose = () => {
    appendMessage(`Vous avez été déconnecté du serveur`);
};

socket.onmessage = event => {
    const data = JSON.parse(event.data);
    if (data.type === 'chat-message') {
        appendMessage(`${data.name}: ${data.message}`);
    } else if (data.type === 'user-connected') {
        appendMessage(`${data.name} a rejoint le groupe`);
    } else if (data.type === 'user-disconnected') {
        appendMessage(`${data.name} a quitté le groupe`);
    }
};

messageForm.addEventListener('submit', e => {
    e.preventDefault();
    const message = messageInput.value.trim();
    if (message !== '') {
        appendMessage(`Vous : ${message}`);
        socket.send(JSON.stringify({ type: 'send-chat-message', message: message }));
        messageInput.value = '';
    }
});

function appendMessage(message) {
    const messageElement = document.createElement('div');
    messageElement.innerText = message;
    messageContainer.appendChild(messageElement);
}
