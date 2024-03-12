<?php

define('_MYSQL_HOST', '127.0.0.1');
define('_MYSQL_PORT', 3306);
define('_MYSQL_DBNAME', 'db');
define('_MYSQL_USER', 'root');
define('_MYSQL_PASSWORD', '');

try {
    $pdo = new PDO("mysql:host=" . _MYSQL_HOST . ";port=" . _MYSQL_PORT . ";dbname=" . _MYSQL_DBNAME, _MYSQL_USER, _MYSQL_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erreur) {
    echo 'Erreur de connexion à la base de données : ' . $erreur->getMessage();
    exit;
}

class User {
    protected $props = [];

    public function __construct($props = array()) { $this->props = $props;}

    public function __get($prop) { return $this->props[$prop] ?? null;}

    public function __set($prop, $val) { $this->props[$prop] = $val;}

    protected static function db() {
        global $pdo;
        return $pdo;
    }

    public static function query($sql) {
        $st = static::db()->query($sql) or die("sql query error | request : ".$sql);
        $st->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'User');
        return $st->fetchAll();
    }
}

$users = User::query("SELECT * FROM User");

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des utilisateurs</title>
</head>
<body>
    <h1>Liste des Utilisateurs</h1>
    <?php if (!empty($users)): ?>
        <ul>
            <?php foreach ($users as $user): ?>
                <li><?php echo $user->name; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Aucun utilisateur trouvé.</p>
    <?php endif; ?>
</body>
</html>
