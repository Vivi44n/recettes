<?php
require("db/connexion_bdd.php");
?>

<form action="connexion_bdd.php" method="post">
    <label for="identifiant">Identifiant</label>
    <input type="text" name="identifiant" id="identifiant" placeholder="Entrez votre identifiant" required />

    <label for="mdp">Mot de passe</label>
    <input type="password" name="mdp" id="mdp" placeholder="Entrez votre mot de passe" required />

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="Entrez votre email" required />

    <button type="submit">Soumettre</button>
</form>