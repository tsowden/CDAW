<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice JavaScript</title>
</head>

<body>

    <button id="b1">Bouton 1</button>
    <button id="b2">Bouton 2</button>
    <p id="box"></p>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Sélection des boutons
            const button1 = document.getElementById("b1");
            const button2 = document.getElementById("b2");
            const box = document.getElementById("box");
            // const eventListenerStatus = document.getElementById("eventListenerStatus");

            // Fonction pour ajouter un gestionnaire d'événement à un bouton
            function addEventHandler(button, handler) {
                button.addEventListener("click", handler);
            }

            // Fonction pour supprimer un gestionnaire d'événement d'un bouton
            function removeEventHandler(button, handler) {
                button.removeEventListener("click", handler);
            }

            // Fonction qui change les gestionnaires d'événement entre les deux boutons
            function toggleEventHandlers() {
                // Si b1 a un gestionnaire d'événement, le supprimer et l'ajouter à b2
                if (button1.hasEventHandler) {
                    removeEventHandler(button1, toggleEventHandlers);
                    addEventHandler(button2, toggleEventHandlers);
                    button1.hasEventHandler = false;
                    button2.hasEventHandler = true;
                    box.innerText = "<b>bouton 2</b>";
                }
                // Sinon, le supprimer de b2 et l'ajouter à b1
                else {
                    removeEventHandler(button2, toggleEventHandlers);
                    addEventHandler(button1, toggleEventHandlers);
                    button1.hasEventHandler = true;
                    button2.hasEventHandler = false;
                    box.innerText = "bouton 1";
                }
            }

            // Au début, seul b1 possède un gestionnaire d'événement
            button1.hasEventHandler = true;
            button2.hasEventHandler = false;

            // Ajouter le gestionnaire d'événement initial sur b1
            addEventHandler(button1, toggleEventHandlers);
        });
    </script>

</body>

</html>