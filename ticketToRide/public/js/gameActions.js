
function getCurrentGameIdAndPickCard(cardId, element) { 
        fetch('/game/current-game-id', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.gameId) {
            pickCard(cardId, data.gameId, element); 
        } else {
            console.error('Aucune partie en cours trouvée pour l\'utilisateur');
        }
    })
    .catch(error => console.error('Erreur lors de la récupération de l\'ID de la partie actuelle:', error));
}

function pickCard(cardId, gameId, element) {
        fetch(`/game/pick-card/${cardId}/${gameId}`, { 
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if(data.success) {
            const quantitySpan = document.querySelector(`.card-quantity.${data.cardType}`);
            quantitySpan.textContent = data.newTotal;
    
            if (data.newCard) {
                element.innerHTML = `<img src="${data.newCard.wc_image}" alt="Carte Wagon ${data.newCard.wc_color}" class="wagon-card">`;
                element.dataset.cardId = data.newCard.wc_id; 
            }
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.visible-card').forEach(card => {
        card.addEventListener('click', function() {
            const cardId = this.dataset.cardId;
            getCurrentGameIdAndPickCard(cardId, this); 
        });
    });
});




