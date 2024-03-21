<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat App</title>
    <script defer src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script defer src="script.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            background-color: #0a1318;
            /* Couleur de fond pour le corps */
        }

        #message-container {
            width: 80%;
            max-width: 1200px;
            margin-top: 20px;
            /* Espacement par rapport au haut de la page */
        }

        #message-container div {
            background-color: #222e35;
            color: white;
            /* Couleur de fond pour les messages */
            padding: 10px;
            margin-bottom: 10px;
            /* Espacement entre les messages */
            border-radius: 15px;
            /* Bords arrondis */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Ombre pour un effet de profondeur */
        }

        #message-container div:nth-child(2n) {
            background-color: #054740;
            color: white;
            /* Couleur de fond alternative pour les messages */
        }

        #send-container {
            position: fixed;
            padding: 15px;
            bottom: 0;
            background-color: #1c282f;
            /* Couleur de fond pour la zone d'envoi de message */
            max-width: 1200px;
            width: 80%;
            display: flex;
            border-top-left-radius: 20px;
            /* Bords arrondis en haut à gauche */
            border-top-right-radius: 20px;
            /* Bords arrondis en haut à droite */
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
            /* Ombre pour un effet de profondeur */
        }

        #message-input {
            flex-grow: 1;
            padding: 10px;
            background-color: #101d24;
            color: white;
            border: none;
            border-bottom-left-radius: 10px;
            /* Bords arrondis en bas à gauche */
            outline: none;
            /* Suppression de la bordure de focus */
        }

        #send-button {
            padding: 10px 20px;
            background-color: #17ba86;
            /* Couleur de fond pour le bouton d'envoi */
            color: white;
            border: none;
            border-radius: 10px;
            /* Bords arrondis en bas à droite */
            cursor: pointer;
            transition: background-color 0.3s;
            /* Transition fluide pour l'effet de survol */
        }

        #send-button:hover {
            background-color: #07e759;
            /* Couleur de fond au survol */
        }
    </style>
</head>

<body>
    @extends('menu')
    <div id="message-container"></div>
    <form id="send-container">
        <input type="text" id="message-input">
        <button type="submit" id="send-button"><i class="bi bi-arrow-up-circle-fill"></i></button>
    </form>
</body>

</html>