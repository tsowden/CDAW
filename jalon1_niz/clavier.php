<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Déplacement via le clavier</title>
    <style>
        #medias>div {
            display: none;
        }

        #medias>div:focus {
            outline: none;
        }

        #focus {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div>
        <div id="focus"></div>

        <div id="medias">
            <div id="m1" tabindex="0">
                <h4 class="title">Title1</h4>
                <p class="descr">Description description...</p>
                <img class="img" alt="an-img">
            </div>
            <div id="m2" tabindex="0">
                <h4 class="title">Title2</h4>
                <p class="descr">Description description...</p>
                <img class="img" alt="an-img">
            </div>
            <div id="m3" tabindex="0">
                <h4 class="title">Title3</h4>
                <p class="descr">Description description...</p>
                <img class="img" alt="an-img">
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const focusDiv = document.getElementById('focus');
            const medias = document.querySelectorAll('#medias > div');

            // Par défaut, cacher tous les médias
            medias.forEach(media => {
                media.style.visibility = 'hidden';
            });

            // Fonction pour afficher un média spécifique
            function showMedia(index) {
                medias.forEach(media => {
                    media.style.visibility = 'hidden';
                });
                medias[index].style.visibility = 'visible';

                // Définir le focus sur le média affiché
                medias[index].focus();

                // Mettre à jour la zone de focus
                const title = medias[index].querySelector('.title').textContent;
                const descr = medias[index].querySelector('.descr').textContent;
                focusDiv.innerHTML = `<h4>${title}</h4><p>${descr}</p>`;
            }

            // Fonction pour gérer les touches du clavier
            function handleKeyPress(event) {
                if (event.ctrlKey) {
                    const currentIndex = Array.from(medias).findIndex(media => media.style.visibility === 'visible');

                    if (event.key === 'ArrowLeft') {
                        // Décrémenter l'index et afficher le média précédent
                        const newIndex = (currentIndex - 1 + medias.length) % medias.length;
                        showMedia(newIndex);
                    } else if (event.key === 'ArrowRight') {
                        // Incrémenter l'index et afficher le média suivant
                        const newIndex = (currentIndex + 1) % medias.length;
                        showMedia(newIndex);
                    }
                }
            }

            // Ajouter un gestionnaire d'événement pour les touches du clavier
            document.addEventListener('keydown', handleKeyPress);

            // Afficher le premier média par défaut
            showMedia(0);
        });
    </script>

</body>

</html>