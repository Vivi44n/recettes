<?php
$currentYear = date("Y");
$siteName = "Bon app"; // Remplacez par le nom de votre site
?>

<footer class="footer">
    <p>&copy; <?php echo $currentYear; ?> <?php echo htmlspecialchars($siteName); ?>. Tous droits réservés.</p>
    <nav class="footer-nav">
        <a href="./cuisine/index.php">Accueil</a>
        <a href="./cuisine/pages/contact.php">Contact</a>
    </nav>
</footer>

