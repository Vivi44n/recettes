<?php
// Exemple basique. Vous pouvez ajouter une logique pour gérer l'état de connexion ici.
?>

<nav class="navbar">
  <ol>
    <li class="accueil"><a href="#"></a></li>
  </ol>
  
  <!-- Titre centré -->
  <div class="navbar-title">
    <h1>
      <a href="http://localhost/projet/cuisine/recettes/1">Bon App</a>
    </h1>
  </div>
  
  <div class="auth-button">
    <a href="pages/login.php" class="btn-login">Connexion</a>
  </div>
</nav>

<style>
  body {
    margin: 0;
  }

  .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f4f4f4;
    padding: 10px 20px;
    border-bottom: 1px solid #ccc;
  }

  .navbar ol {
    list-style: none;
    display: flex;
    padding: 0;
    margin: 0;
  }

  .navbar li {
    font-size: 18px;
  }

  .navbar a {
    text-decoration: none;
    color: #000; /* Couleur du lien par défaut pour "Bon App" */
  }

  .navbar-title {
    font-size: 24px;
    font-weight: bold;
    margin: 0;
    text-align: center;
    flex-grow: 1; /* Pour centrer le titre en utilisant l'espace disponible */
  }

  .auth-button {
    margin-left: auto; /* Place le bouton de connexion à droite */
  }

  .btn-login {
    padding: 8px 15px;
    background-color: #eb4034;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    color: #ffffff; /* Couleur du texte "Connexion" en blanc */
  }

  .btn-login:hover {
    background-color: #0056b3;
  }
</style>