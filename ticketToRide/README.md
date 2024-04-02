## GameController

- **index(Request $request)**: Affiche la vue principale du jeu, servant de point d'entrée pour les sessions de jeu actives.
- **play($gameId)**: Vérifie l'authentification de l'utilisateur et sa participation à la partie désignée par $gameId, puis charge la vue de jeu avec les informations pertinentes.
- **create_game(Request $request)**: Présente la vue de création d'une nouvelle partie, généralement sous forme d'un formulaire.
- **store(Request $request)**: Valide et traite les données du formulaire de création de partie, crée la partie avec les paramètres fournis, et redirige vers le lobby de la partie créée avec un message de succès.
- **games()**: Affiche toutes les parties en attente de démarrage, en chargeant et affichant les informations sur le créateur et les participants pour chaque partie.
- **join($gameId)**: Permet à l'utilisateur actuel de rejoindre une partie existante, en s'assurant que la partie n'est pas complète avant d'ajouter l'utilisateur et de le rediriger vers le lobby de la partie.

## LobbyController

- **show($gameId)**: Charge et affiche les détails d'une partie spécifique, y compris la liste des participants, pour l'utilisateur dans la vue du lobby de la partie.
- **leave($gameId)**: Permet à l'utilisateur actuel de quitter le lobby de la partie désignée, en supprimant sa participation et en le redirigeant vers la liste des parties disponibles avec un message de confirmation.