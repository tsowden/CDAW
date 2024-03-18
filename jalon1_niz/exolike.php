<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Exercice Like - JavaScript</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <div>
        <h4>Mon média 1</h4>
        <div class="like-b">
            <span>Liked!</span>
            <i class="like-b fa fa-heart" onclick="toggleLike(this.parentNode)"></i>
        </div>
    </div>

    <script>
        "use strict";

        function toggleLike(element) {
            //element = le <div> "like-b"
            element.children[0].classList.toggle('press'); // children[0] = le <span> Like
            element.children[1].classList.toggle('press'); // children[1] = l'icone <i> Coeur
        }
    </script>

</body>

</html>