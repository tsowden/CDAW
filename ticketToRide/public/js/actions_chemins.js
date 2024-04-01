function getColorForUser(username) {
    // Logique pour attribuer une couleur en fonction du nom de l'utilisateur
    // Vous pouvez utiliser une fonction de hachage ou une logique personnalisée pour cela
    // Voici un exemple simple qui utilise une fonction de hachage
    const colors = ['#0800ff', '#ff0000', '#00ff22', '#fffb00', '#00fffb', '#ff8400']; // Liste de couleurs possibles dans l'ordre bleu rouge vert jaune cyan orange
    const hash = username.split('').reduce((acc, char) => acc + char.charCodeAt(0), 0);
    const colorIndex = hash % colors.length;
    return colors[colorIndex];
}

function onClickButton(buttonId, username) {
    let trajetId = "trajet-" + buttonId.split("-")[1] + "-" + buttonId.split("-")[2];
    let color = getColorForUser(username); // Obtenir la couleur en fonction du nom de l'utilisateur
    document.getElementById(trajetId).style.backgroundColor = color;
    document.getElementById(trajetId).style.height = "15px";
    let chiffreId = "chiffre-" + buttonId.split("-")[1] + "-" + buttonId.split("-")[2];
    let chiffreElement = document.getElementById(chiffreId);
    let longueurChemin = parseInt(chiffreElement.innerText);
    if (longueurChemin == 1) {
        // Modifier les Points
        let pointsCell = document.getElementById('points-cell');
        let currentPoints = parseInt(pointsCell.innerText); // Convertir en entier

        currentPoints += 1; // Ajouter des points (par exemple)
        pointsCell.innerText = currentPoints; // Mettre à jour le contenu de la cellule Points

        // Modifier les Wagons
        let wagonsCell = document.getElementById('wagons-cell');
        let currentWagons = parseInt(wagonsCell.innerText); // Convertir en entier
        currentWagons -= 1; // Diminuer le nombre de wagons (par exemple)
        wagonsCell.innerText = currentWagons; // Mettre à jour le contenu de la cellule Wagons

    }
    if (longueurChemin == 2) {
        // Modifier les Points
        let pointsCell = document.getElementById('points-cell');
        let currentPoints = parseInt(pointsCell.innerText); // Convertir en entier

        currentPoints += 2; // Ajouter des points (par exemple)
        pointsCell.innerText = currentPoints; // Mettre à jour le contenu de la cellule Points

        // Modifier les Wagons
        let wagonsCell = document.getElementById('wagons-cell');
        let currentWagons = parseInt(wagonsCell.innerText); // Convertir en entier
        currentWagons -= 2; // Diminuer le nombre de wagons (par exemple)
        wagonsCell.innerText = currentWagons; // Mettre à jour le contenu de la cellule Wagons

    }
    if (longueurChemin == 3) {
        // Modifier les Points
        let pointsCell = document.getElementById('points-cell');
        let currentPoints = parseInt(pointsCell.innerText); // Convertir en entier

        currentPoints += 4; // Ajouter des points (par exemple)
        pointsCell.innerText = currentPoints; // Mettre à jour le contenu de la cellule Points

        // Modifier les Wagons
        let wagonsCell = document.getElementById('wagons-cell');
        let currentWagons = parseInt(wagonsCell.innerText); // Convertir en entier
        currentWagons -= 3; // Diminuer le nombre de wagons (par exemple)
        wagonsCell.innerText = currentWagons; // Mettre à jour le contenu de la cellule Wagons

    }
    if (longueurChemin == 4) {
        // Modifier les Points
        let pointsCell = document.getElementById('points-cell');
        let currentPoints = parseInt(pointsCell.innerText); // Convertir en entier

        currentPoints += 7; // Ajouter des points (par exemple)
        pointsCell.innerText = currentPoints; // Mettre à jour le contenu de la cellule Points

        // Modifier les Wagons
        let wagonsCell = document.getElementById('wagons-cell');
        let currentWagons = parseInt(wagonsCell.innerText); // Convertir en entier
        currentWagons -= 4; // Diminuer le nombre de wagons (par exemple)
        wagonsCell.innerText = currentWagons; // Mettre à jour le contenu de la cellule Wagons

    }
    if (longueurChemin == 5) {
        // Modifier les Points
        let pointsCell = document.getElementById('points-cell');
        let currentPoints = parseInt(pointsCell.innerText); // Convertir en entier

        currentPoints += 10; // Ajouter des points (par exemple)
        pointsCell.innerText = currentPoints; // Mettre à jour le contenu de la cellule Points

        // Modifier les Wagons
        let wagonsCell = document.getElementById('wagons-cell');
        let currentWagons = parseInt(wagonsCell.innerText); // Convertir en entier
        currentWagons -= 5; // Diminuer le nombre de wagons (par exemple)
        wagonsCell.innerText = currentWagons; // Mettre à jour le contenu de la cellule Wagons

    }
    if (longueurChemin == 6) {
        // Modifier les Points
        let pointsCell = document.getElementById('points-cell');
        let currentPoints = parseInt(pointsCell.innerText); // Convertir en entier

        currentPoints += 15; // Ajouter des points (par exemple)
        pointsCell.innerText = currentPoints; // Mettre à jour le contenu de la cellule Points

        // Modifier les Wagons
        let wagonsCell = document.getElementById('wagons-cell');
        let currentWagons = parseInt(wagonsCell.innerText); // Convertir en entier
        currentWagons -= 6; // Diminuer le nombre de wagons (par exemple)
        wagonsCell.innerText = currentWagons; // Mettre à jour le contenu de la cellule Wagons

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

