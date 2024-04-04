const socket2 = new WebSocket('ws://localhost:3000');

socket2.onmessage = event => {
    const data = JSON.parse(event.data);
    switch (data.type) {
        case 'leave-click':
            retirerParticipant(data.userName);
            console.log("adieu");
            break;
        default:
            console.log("Unknown message type");
    }
};


const buttonQuit = document.getElementById("leave-button");
if (buttonQuit) {
    buttonQuit.addEventListener("click", function (event) {
        handleLeaveClick(event.target.id);
        console.log("aurevoir");
    });
} else {
    console.error("Element with id 'leave-button' not found.");
}




function retirerParticipant(username) {
    // Sélectionner tous les éléments li dans la liste des participants
    const participants = document.querySelectorAll(".form-container ul li");

    // Parcourir tous les éléments li pour trouver celui qui correspond au nom d'utilisateur à retirer
    participants.forEach(function (participant) {
        if (participant.textContent.trim() === username) {
            // Retirer l'élément li de la liste
            participant.remove();
        }
    });
}

function handleLeaveClick(buttonId) {
    const userName = document.getElementById('utilisateur').getAttribute('data-nom');
    socket2.send(JSON.stringify({ type: 'leave-button-clicked', buttonId: buttonId, userName: userName }));
}
