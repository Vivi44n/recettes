<?php

$host = 'localhost';
$port = 5432;
$dbname = 'vivianrecettes';
$username = 'vivian';
$password  = 'motdepasseimpossible';

try {

// conexion à la BDD acec PSO
$dsn = "mysql:host $host;port;dbnale $dbname;";
$pdo = new  PDO ($dsn , $username, $password);

// config attribut PDO
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

    die("Erreur de connexion ou de requète" . $e->getMessage());

}

// Fermeture de la session


// connexion bdd
// require("./db/connexion.php");

?>

