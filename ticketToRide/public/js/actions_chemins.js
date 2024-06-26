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
    let chiffreId = "chiffre-" + buttonId.split("-")[1] + "-" + buttonId.split("-")[2];
    let chiffreElement = document.getElementById(chiffreId);
    let longueurChemin = parseInt(chiffreElement.innerText);
    document.getElementById(trajetId).style.backgroundColor = color;
    document.getElementById(trajetId).style.height = "15px";

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
    bouton.disabled = true;


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
        const backgroundColor = button.style.backgroundColor;
        let couleurBouton = 'black';
        if (backgroundColor === 'var(--color-chemin-noir)') {
            // Si la couleur du bouton est noire, assignez 'black' à la variable couleurBouton
            couleurBouton = 'black';
        }
        if (backgroundColor === 'var(--color-chemin-jaune)') {
            // Si la couleur du bouton est noire, assignez 'black' à la variable couleurBouton
            couleurBouton = 'yellow';
        }
        if (backgroundColor === 'var(--color-chemin-rouge)') {
            // Si la couleur du bouton est noire, assignez 'black' à la variable couleurBouton
            couleurBouton = 'red';
        }
        if (backgroundColor === 'var(--color-chemin-bleu)') {
            // Si la couleur du bouton est noire, assignez 'black' à la variable couleurBouton
            couleurBouton = 'blue';
        }
        if (backgroundColor === 'var(--color-chemin-rose)') {
            // Si la couleur du bouton est noire, assignez 'black' à la variable couleurBouton
            couleurBouton = 'violet';
        }
        if (backgroundColor === 'var(--color-chemin-vert)') {
            // Si la couleur du bouton est noire, assignez 'black' à la variable couleurBouton
            couleurBouton = 'green';
        }
        if (backgroundColor === 'var(--color-chemin-cyan)') {
            // Si la couleur du bouton est noire, assignez 'black' à la variable couleurBouton
            couleurBouton = 'cyan';
        }
        if (backgroundColor === 'var(--color-chemin-orange)') {
            // Si la couleur du bouton est noire, assignez 'black' à la variable couleurBouton
            couleurBouton = 'orange';
        }
        if (backgroundColor === 'var(--color-chemin-noir)') {
            // Si la couleur du bouton est noire, assignez 'black' à la variable couleurBouton
            couleurBouton = 'black';
        }
        if (backgroundColor === 'var(--color-chemin-gris)') {
            // Si la couleur du bouton est noire, assignez 'black' à la variable couleurBouton
            couleurBouton = 'gris';
        }
        let chiffreId = "chiffre-" + button.id.split("-")[1] + "-" + button.id.split("-")[2];
        let chiffreElement = document.getElementById(chiffreId);
        let longueurChemin = parseInt(chiffreElement.innerText);

        onPathClick(couleurBouton, longueurChemin)
            .then(() => {
                handleButtonClick(button.id);
                button.disabled = true; // pour que le bouton ne soit cliquable qu'une seule fois
            })
            .catch((error) => {
                // La promesse est rejetée, donc il y a eu une erreur dans la requête AJAX
                // Vous pouvez traiter l'erreur ici
                console.error("Le catch dans onClickButton s'est déclenché:", error);
            });



    });
    // onClickButton(button.id); // ceci est la fonction qui fait un changment de couleur mais on a plus besoin de l'appeler
    // ici puisque handleButtonClick dans le server va broadacter à tout le monde user qui dans script.js déclenche onClickButton
});

function getCurrentGameId(callback) {
    $.ajax({
        url: '/current-game-id',
        type: 'GET',
        success: function (response) {
            if (response.gameId) {
                console.log("Current Game ID: ", response.gameId);
                if (typeof callback === "function") {
                    callback(response.gameId);
                }
            }
        },
        error: function (xhr, status, error) {
            console.error("Erreur lors de la récupération de l'ID de la partie actuelle: ", status, error);
        }
    });
}

function onPathClick(color, amount) {
    return new Promise((resolve, reject) => {
        getCurrentGameId(function (gameId) {
            // Utilisez gameId ici
            $.ajax({
                url: `/games/${gameId}/use-wagon-cards`,
                type: 'POST',
                data: {
                    color: color,
                    amount: amount,
                    _token: $('meta[name="csrf-token"]').attr('content') // Assurez-vous que le token CSRF est inclus si nécessaire
                },
                success: function (response) {
                    if (response.success) {
                        // Mettez à jour l'affichage de la quantité de cartes pour la couleur concernée
                        $(`.card-quantity.${color}`).text(response.newTotal);
                        resolve();
                    } else {
                        alert("Erreur : " + response.error);
                        reject("Erreur : " + response.error);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Erreur AJAX : " + status + " - " + error);
                    if (color === 'gris') {
                        // Traitez différemment l'action pour la couleur 'gris'
                        console.log("Action spéciale pour la couleur 'gris'");
                        const inputOptions = {
                            'red': "Rouge",
                            'green': "Vert",
                            'blue': "Bleu",
                            'yellow': "Jaune",
                            'cyan': "Cyan",
                            'violet': "Rose",
                            'orange': "Orange",
                            'black': "Noir",
                        };

                        // Créez une nouvelle promesse pour encapsuler l'appel à onPathClick

                        Swal.fire({
                            title: "Chemin gris : choisissez une couleur",
                            input: "select",
                            inputOptions: inputOptions,
                            inputValidator: (value) => {
                                if (!value) {
                                    return "Vous devez choisir une couleur !";
                                }
                            }
                        }).then((result) => {
                            if (result.value) {
                                const selectedColor = result.value;
                                // Appel à onPathClick encapsulé dans une promesse
                                onPathClick(selectedColor, amount)
                                    .then(() => {
                                        // Résolution de la promesse externe avec succès
                                        resolve();
                                    })
                                    .catch((error) => {
                                        // Rejet de la promesse externe avec l'erreur de onPathClick
                                        reject(error);
                                    });

                                // Affichage du message de sélection
                                Swal.fire({ html: `Vous avez sélectionné : ${inputOptions[selectedColor]}` });
                            }
                        });



                    } else {

                        // Autre traitement d'erreur pour les autres couleurs
                        Swal.fire({
                            icon: 'error',
                            title: 'Pas assez de cartes',
                            text: "Vous n'avez pas assez de cartes de cette couleur pour jouer sur ce chemin.",
                        });
                        reject("Erreur AJAX : " + status + " - " + error);
                    }
                }
            });
        });
    });
}

