const socket = new WebSocket('ws://localhost:3000');

socket.onmessage = event => {
    const data = JSON.parse(event.data);
    switch (data.type) {
        case 'join-click':
            ajouterParticipant(data.userName);
            console.log(coucou);
            break;
        default:
            console.log("Unknown message type");
    }
};


const buttonJoin = document.getElementById("join-button");
document.addEventListener("DOMContentLoaded", function () {
    // Utilisation d'un délégué d'événements pour gérer les clics sur les boutons avec la classe 'join-button'
    document.addEventListener("click", function (event) {
        if (event.target && event.target.classList.contains("join-button")) {
            event.preventDefault(); // Empêcher le comportement par défaut du bouton submit
            handleJoinClick(event.target.id);
        }
    });
});


function ajouterParticipant(username) {
    // Créer un élément li pour le nouvel utilisateur
    var newParticipant = document.createElement("li");
    // Ajouter le nom d'utilisateur au texte de l'élément li
    newParticipant.textContent = username;

    // Sélectionner l'élément ul où les participants sont listés
    var participantsList = document.querySelector(".form-container ul");

    // Ajouter le nouvel utilisateur à la liste des participants
    participantsList.appendChild(newParticipant);
}

function handleJoinClick(buttonId) {
    const userName = document.getElementById('utilisateur').getAttribute('data-nom');
    socket.send(JSON.stringify({ type: 'join-button-clicked', buttonId: buttonId, userName: userName }));

}
