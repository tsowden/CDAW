document.addEventListener('DOMContentLoaded', function() {
    const moveCardsBtn = document.getElementById('move-cards-btn');
    const selectedCardsContainer = document.getElementById('selected-cards-container');
    const destCardsTrigger = document.getElementById('dest-cards-trigger');
    const cardsContainer = document.getElementById('random-dest-cards'); // Conteneur des cartes de destination

    destCardsTrigger.addEventListener('click', function() {
        displayRandomDestCards();
        moveCardsBtn.style.display = 'block'; // Affiche le bouton
        cardsContainer.style.display = 'flex'; // Réaffiche les cartes de destination
    });

    function displayRandomDestCards() {
        const destCards = [
            'cartes_destination_ADA_LISP.png',
            'cartes_destination_ARIANA_CRYSTAL.png',
            'cartes_destination_FORTRAN_TONIZ.png',
            'cartes_destination_GROOVY_DELPHI.png',
            'cartes_destination_GROOVY_PERL.png',
            'cartes_destination_HASKELL_JULIA.png',
            'cartes_destination_HASKELL_LUA.png',
            'cartes_destination_HASKELL_RUBY.png',
            'cartes_destination_JAVA_ERLANG.png',
            'cartes_destination_KOTLIN_TONIZ.png',
            'cartes_destination_PASCAL_DART.png',
            'cartes_destination_PASCAL_SWIFT.png',
            'cartes_destination_PASCAL_TEMPLAKE.png',
            'cartes_destination_PYTHON_ARIANA.png',
            'cartes_destination_RUST_ELM.png',
        ];

        shuffleArray(destCards);
        const selectedCards = destCards.slice(0, 3);
        cardsContainer.innerHTML = ''; // Nettoie le conteneur à chaque fois

        selectedCards.forEach(function(cardName) {
            const imgElement = document.createElement('img');
            imgElement.src = `${basePath}/${cardName}`;
            imgElement.alt = "Carte Destination";
            imgElement.classList.add("dest-card");
            imgElement.style.width = "120px";
            imgElement.style.height = "auto";

            imgElement.addEventListener('click', function() {
                this.classList.toggle('selected-card');
            });

            cardsContainer.appendChild(imgElement);
        });
    }

    moveCardsBtn.addEventListener('click', function() {
        const selectedCards = document.querySelectorAll('.dest-card.selected-card');
        selectedCards.forEach(function(card) {
            selectedCardsContainer.appendChild(card);
            card.classList.remove('selected-card');
        });

        this.style.display = 'none'; // Cache le bouton après le déplacement
        cardsContainer.style.display = 'none'; // Cache les cartes non sélectionnées
    });

    function shuffleArray(array) {
        for (let i = array.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [array[i], array[j]] = [array[j], array[i]];
        }
    }


    // Gestion du clic sur les cartes wagon
    const cardContainers = document.querySelectorAll('.card-container');
    cardContainers.forEach((container, index) => {
        if (index === 0 && !container.querySelector('.card-cover')) {
            container.classList.add('visible-card-first');
            container.innerHTML += `<img src="{{ asset('images/dos_wc.png') }}" alt="Cache" class="card-cover" style="position: absolute; top: 0; left: 0; width: 120px; height: auto; z-index: 1; pointer-events: none;">`;
        }

        const card = container.querySelector('.wagon-card');
        card.addEventListener('click', function() {
            const cardId = container.dataset.cardId;
            getCurrentGameIdAndPickCard(cardId, container); 
        });
    });

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

                if(data.newCard) {
                    const cardImage = element.querySelector('img.wagon-card');
                    // Vérifiez si data.newCard.wc_image est déjà une URL complète
                    if(data.newCard.wc_image.startsWith('http')) {
                        cardImage.src = data.newCard.wc_image;
                    } else {
                        cardImage.src = `${basePath}/${data.newCard.wc_image}`;
                    }
                    cardImage.alt = `Carte Wagon ${data.newCard.wc_color}`;
                    element.dataset.cardId = data.newCard.wc_id;
                
                

                    if (element.classList.contains('visible-card-first')) {
                        const cardCover = element.querySelector('img.card-cover');
                        if (!cardCover) {
                            element.innerHTML += `<img src="{{ asset('images/dos_wc.png') }}" alt="Cache" class="card-cover" style="position: absolute; top: 0; left: 0; width: 120px; height: auto; z-index: 1; pointer-events: none;">`;
                        }
                    }
                }
            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }
});
