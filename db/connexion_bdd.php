<?php

$host = 'localhost';
$port = 3306;
$dbname = 'vivianrecettes';
$username = 'root';
$password  = '';

try {

    // connexion à la BDD avec PSO
    $dsn = "mysql:host=$host;port=3306; dbname=$dbname;";
    $pdo = new  PDO($dsn, $username, $password);

    // config attribut PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    die("Erreur de connexion ou de requète" . $e->getMessage());
}

// Fermeture de la connexion
?>
