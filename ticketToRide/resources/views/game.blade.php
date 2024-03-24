<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les Aventuriers du Rail</title>
    <link rel="stylesheet" href="styles.css"> <!-- Inclure votre fichier CSS -->
</head>

<body>
    <div id="map-container">
        <img src="assets/img/map240324.png" alt="Carte des Aventuriers du Rail" id="map-image">

        <style>
            #map-container {
                width: 1420px;
                /* Largeur de la carte */
                height: 800px;
                /* Hauteur de la carte */
                border: 1px solid #000;
                /* Bordure de la carte */
                position: relative;
                /* Position relative pour positionner l'image absolument */
                overflow: hidden;
                /* Masquer tout contenu dépassant du conteneur */
            }

            #map-image {
                position: absolute;
                /* Position absolue pour que l'image remplisse le conteneur */
                width: auto;
                /* Largeur automatique pour conserver les proportions */
                height: 100%;
                /* Hauteur de l'image à 100% du conteneur */
                top: 0;
                /* Aligner en haut du conteneur */
                left: 0;
                /* Aligner à gauche du conteneur */
            }
        </style>
    </div>
    <form method="POST">
        @csrf
        <label for="num_players">Nombre de joueurs :</label>
        <input type="number" id="num_players" name="num_players" min="2" max="6" required>
        <br>
        <label for="turn_duration">Durée des tours (en minutes) :</label>
        <input type="number" id="turn_duration" name="turn_duration" min="1" required>
        <br>
        <input type="submit" value="Créer la partie">
    </form>

</body>

</html>