Pour faire fonctionner le chat il faut
PS C:\wamp64\www\CDAW\ticketToRide\public\js> node server.js
Donc executer cette commande en se mettant dans le dossier où se trouve le server.js

Ne pas oublier npm run watch pour compiler en continu le js modifié si on modifie des choses.

Il faut cependant restart le server pour tester les modification avec la commande node server.js
C'est là qu'on voit l'intéret de nodemon

---------------------
Tests
Le noms des classes de test doit se terminer par "Test" et le nom des fonctions de test doit commencer par "test"

Pour pouvoir faire les tests sans effacer toute la base de données, il faut modifier phpunit.xml et uncomment ceci :
        <server name="DB_CONNECTION" value="sqlite"/>
        <server name="DB_DATABASE" value=":memory:"/>
J'ai ensuite installé l'extension sqlite dans vscode.

Tests Dusk :
composer require --dev laravel/dusk
php artisan dusk:install
set the APP_URL in .env to match the URL you use to access your application in a browser