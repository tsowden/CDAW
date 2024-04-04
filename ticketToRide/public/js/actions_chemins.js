const participantsDivs = document.querySelectorAll('.participant');
const participants = [];
participantsDivs.forEach(div => {
    const participantName = div.getAttribute('data-nom');
    participants.push(participantName);
});

console.log(participants);

function getColorForUser(username) {
    // Trouver l'index de l'utilisateur dans le tableau des participants
    const index = participants.indexOf(username);
    // Utiliser cet index pour sélectionner une couleur dans une liste prédéfinie
    const colors = ['#0800ff', '#ff0000', '#00ff22', '#fffb00', '#00fffb', '#ff8400']; // Liste de couleurs possibles dans l'ordre bleu rouge vert jaune cyan orange
    // Retourner la couleur correspondant à l'index de l'utilisateur
    return colors[index % colors.length];
}


const tableHeader = document.querySelector('.table-opponent-auth th');
const tableHeaderAdversaire = document.querySelector('.table-opponent th');

const userName = document.getElementById('utilisateur').getAttribute('data-nom');


const userColor = getColorForUser(userName);
tableHeader.style.backgroundColor = userColor;

function onClickButton(buttonId, username) {
    let trajetId = "trajet-" + buttonId.split("-")[1] + "-" + buttonId.split("-")[2];
    let color = getColorForUser(username); // Obtenir la couleur en fonction du nom de l'utilisateur
    document.getElementById(trajetId).style.backgroundColor = color;
    document.getElementById(trajetId).style.height = "15px";
    let chiffreId = "chiffre-" + buttonId.split("-")[1] + "-" + buttonId.split("-")[2];
    let chiffreElement = document.getElementById(chiffreId);
    let longueurChemin = parseInt(chiffreElement.innerText);
    // let pointsCell = document.getElementById('points-cell');
    let tableCible;
    if (username === userName) {
        tableCible = document.querySelector('.table-opponent-auth');
    }
    else {
        // Recherche de la table qui contient le bon nom d'utilisateur
        const tablesAdversaires = document.querySelectorAll('.table-opponent');
        tablesAdversaires.forEach(table => {
            const ths = table.querySelectorAll('th');
            ths.forEach(th => {
                if (th.textContent.trim() === username.trim()) {
                    tableCible = table;
                }
            });
        });
    }
    let pointsCell = tableCible.querySelector('#points-cell');
    let wagonsCell = tableCible.querySelector('#wagons-cell');
    tableCible.querySelector('th').style.backgroundColor = color;

    let currentPoints = parseInt(pointsCell.innerText);
    ajoutePoints(longueurChemin, pointsCell, currentPoints);
    retireWagons(longueurChemin, wagonsCell);
}
function retireWagons(longueurChemin, wagonsCell) {
    // let wagonsCell = document.getElementById('wagons-cell');
    let currentWagons = parseInt(wagonsCell.innerText); // Convertir en entier
    currentWagons -= longueurChemin; // Diminuer le nombre de wagons de la longueur du chemin
    wagonsCell.innerText = currentWagons;
    if (currentWagons <= 0) {
        socket.send(JSON.stringify({ type: 'send-chat-message', message: `J'ai a terminé mes wagons !` })); // il faudrait ici mettre fin à la partie
    }
}

function ajoutePoints(longueurChemin, pointsCell, currentPoints) {
    if (longueurChemin == 1) {
        currentPoints += 1;
        pointsCell.innerText = currentPoints;

    }
    if (longueurChemin == 2) {
        currentPoints += 2;
        pointsCell.innerText = currentPoints;

    }
    if (longueurChemin == 3) {
        currentPoints += 4;
        pointsCell.innerText = currentPoints;

    }
    if (longueurChemin == 4) {
        currentPoints += 7;
        pointsCell.innerText = currentPoints;

    }
    if (longueurChemin == 5) {
        currentPoints += 10;
        pointsCell.innerText = currentPoints;

    }
    if (longueurChemin == 6) {
        currentPoints += 15;
        pointsCell.innerText = currentPoints;

    }
}

// Récupérer tous les boutons par leur classe CSS
let buttons = document.querySelectorAll(".line-button");

// Ajouter un gestionnaire d'événements à chaque bouton
buttons.forEach(button => {
    button.addEventListener("click", function () {
        handleButtonClick(button.id);
        button.disabled = true; // pour que le bouton ne soit cliquable qu'une seule fois
    });
    // onClickButton(button.id); // ceci est la fonction qui fait un changment de couleur mais on a plus besoin de l'appeler
    // ici puisque handleButtonClick dans le server va broadacter à tout le monde user qui dans script.js déclenche onClickButton
});


