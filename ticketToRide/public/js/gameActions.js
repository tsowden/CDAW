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
            // Mise à jour de l'image de la carte sans écraser le contenu de l'élément
            const cardImage = element.querySelector('img.wagon-card');
            cardImage.src = data.newCard.wc_image;
            cardImage.alt = `Carte Wagon ${data.newCard.wc_color}`;
            element.dataset.cardId = data.newCard.wc_id;

            // S'il s'agit de la première carte, remet le cache en place
            if (element.classList.contains('visible-card-first')) {
                const cardCover = element.querySelector('img.card-cover');
                if (!cardCover) {
                    element.innerHTML += `<img src="images/dos_wc.png" alt="Cache" class="card-cover" style="position: absolute; top: 0; left: 0; width: 120px; height: auto; z-index: 1; pointer-events: none;">`;
                }
            }
        }
    }
})
.catch((error) => {
    console.error('Error:', error);
});
}

document.addEventListener('DOMContentLoaded', function() {
    const cardContainers = document.querySelectorAll('.card-container');
    cardContainers.forEach((container, index) => {
        // Marquez la première carte pour y appliquer le cache
        if (index === 0 && !container.querySelector('.card-cover')) {
            container.classList.add('visible-card-first');
            container.innerHTML += `<img src="images/dos_wc.png" alt="Cache" class="card-cover" style="position: absolute; top: 0; left: 0; width: 120px; height: auto; z-index: 1; pointer-events: none;">`;
        }

        const card = container.querySelector('.wagon-card');
        card.addEventListener('click', function() {
            const cardId = container.dataset.cardId;
            getCurrentGameIdAndPickCard(cardId, container); 
        });
    });
});
