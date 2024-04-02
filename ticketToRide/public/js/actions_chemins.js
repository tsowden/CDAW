function getColorForUser(username) {
    // Logique pour attribuer une couleur en fonction du nom de l'utilisateur
    // Vous pouvez utiliser une fonction de hachage ou une logique personnalisée pour cela
    // Voici un exemple simple qui utilise une fonction de hachage
    const colors = ['#0800ff', '#ff0000', '#00ff22', '#fffb00', '#00fffb', '#ff8400']; // Liste de couleurs possibles dans l'ordre bleu rouge vert jaune cyan orange
    const hash = username.split('').reduce((acc, char) => acc + char.charCodeAt(0), 0);
    const colorIndex = hash % colors.length;
    return colors[colorIndex];
}

const tableHeader = document.querySelector('#table-stats th');
const tableHeaderAdversaire = document.querySelector('#table-stats-adversaire th');
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
    let pointsCell, wagonsCell;
    if (username === userName) { //attention cette logique ne fonctionne que en 1v1. En réalité il faudrait un hachage qui les répartit dans un des tableaux en fonctionde leur nom
        pointsCell = document.getElementById('points-cell');
        wagonsCell = document.getElementById('wagons-cell');
    } else {
        const tableAdversaire = document.getElementById('table-stats-adversaire');
        tableHeaderAdversaire.style.backgroundColor = color; // la couleur du tableau de l'adversaire ne changera que l'orsqu'il jouera un coup mais je pense que c'est nécéssaire car il est nécessaire qu'il nous envoie via websocket ses infos
        const thAdversaire = tableAdversaire.querySelector('th');
        thAdversaire.textContent = username;
        pointsCell = tableAdversaire.querySelector('#points-cell');
        wagonsCell = tableAdversaire.querySelector('#wagons-cell');
    }



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

