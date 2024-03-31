function onClickButton(buttonId) {
    // Actions à effectuer lorsqu'un bouton est cliqué
    // Par exemple, changer l'aspect des trajets correspondants
    let trajetId = "trajet-" + buttonId.split("-")[1] + "-" + buttonId.split("-")[2];
    // Modifier l'aspect du trajet correspondant
    document.getElementById(trajetId).style.backgroundColor = "red";
    // Autres actions à effectuer...
}

// Récupérer tous les boutons par leur classe CSS
let buttons = document.querySelectorAll(".line-button");

// Ajouter un gestionnaire d'événements à chaque bouton
buttons.forEach(button => {
    button.addEventListener("click", function () {
        // Appeler la fonction onClickButton avec l'identifiant du bouton cliqué
        // onClickButton(button.id); // ceci est la fonction qui fait un changment de couleur mais on a plus besoin de l'appeler
        // ici puisque handleButtonClick dans le server va broadacter à tout le monde user qui dans script.js déclenche onClickButton
        handleButtonClick(button.id);
    });
});
