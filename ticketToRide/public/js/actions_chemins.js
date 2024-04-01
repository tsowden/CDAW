function getColorForUser(username) {
    // Logique pour attribuer une couleur en fonction du nom de l'utilisateur
    // Vous pouvez utiliser une fonction de hachage ou une logique personnalisée pour cela
    // Voici un exemple simple qui utilise une fonction de hachage
    const colors = ['#0800ff', '#ff0000', '#00ff22', '#fffb00', '#00fffb', '#303030']; // Liste de couleurs possibles dans l'ordre bleu rouge vert jaune cyan noir
    const hash = username.split('').reduce((acc, char) => acc + char.charCodeAt(0), 0);
    const colorIndex = hash % colors.length;
    return colors[colorIndex];
}

function onClickButton(buttonId, username) {
    let trajetId = "trajet-" + buttonId.split("-")[1] + "-" + buttonId.split("-")[2];
    let color = getColorForUser(username); // Obtenir la couleur en fonction du nom de l'utilisateur
    document.getElementById(trajetId).style.backgroundColor = color;
    document.getElementById(trajetId).style.height = "15px";
}

// Récupérer tous les boutons par leur classe CSS
let buttons = document.querySelectorAll(".line-button");

// Ajouter un gestionnaire d'événements à chaque bouton
buttons.forEach(button => {
    button.addEventListener("click", function () {
        handleButtonClick(button.id);
    });
    // onClickButton(button.id); // ceci est la fonction qui fait un changment de couleur mais on a plus besoin de l'appeler
    // ici puisque handleButtonClick dans le server va broadacter à tout le monde user qui dans script.js déclenche onClickButton
});

