document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.visible-card').forEach(card => {
        card.addEventListener('click', function() {
            // Extraire l'ID de la carte depuis l'attribut ID de l'élément
            const cardId = this.dataset.cardId; // Assurez-vous que vos éléments HTML ont un attribut `data-card-id`

            fetch(`/game/pick-card/${cardId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                // Pas besoin d'envoyer la couleur dans le corps de la requête, puisque le serveur peut la déterminer
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if(data.success) {
                    // Mettre à jour le compteur de cartes de cette couleur pour l'utilisateur
                    const quantitySpan = document.querySelector(`.card-quantity.${data.cardType}`);
                    quantitySpan.textContent = data.newTotal;

                    // Remplacer l'image de la carte par une nouvelle carte aléatoire
                    if (data.newCard) {
                        // Mise à jour de l'élément avec les nouvelles informations de la carte
                        this.innerHTML = `<img src="${data.newCard.wc_image}" alt="Carte Wagon ${data.newCard.wc_color}" class="wagon-card">`;
                        this.dataset.cardId = data.newCard.wc_id; // Mettre à jour l'ID de la carte dans l'attribut data-card-id
                    }
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    });
});

// document.addEventListener('DOMContentLoaded', function() {
//     // Sélectionnez tous les boutons de chemin et attachez-leur un gestionnaire de clic
//     document.querySelectorAll('.line-button').forEach(function(button) {
//         button.addEventListener('click', function() {
//             // Lire les données de couleur et de quantité du bouton cliqué
//             const color = this.getAttribute('data-color');
//             const quantity = parseInt(this.getAttribute('data-quantity'), 10);

//             // Trouvez l'élément span qui contient la quantité actuelle pour cette couleur
//             const quantitySpan = document.querySelector(`.card-quantity.${color}`);

//             // Déduire la quantité et mettre à jour l'affichage
//             if (quantitySpan) {
//                 let currentQuantity = parseInt(quantitySpan.textContent, 10);
//                 currentQuantity -= quantity;
//                 quantitySpan.textContent = currentQuantity >= 0 ? currentQuantity : 0;
//             }
//         });
//     });
// });

