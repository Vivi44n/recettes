<?php
$name = $email = $message = "";
$nameErr = $emailErr = $messageErr = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Le nom est requis.";
    } else {
        $name = htmlspecialchars($_POST["name"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "L'email est requis.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Format d'email invalide.";
    } else {
        $email = htmlspecialchars($_POST["email"]);
    }

    if (empty($_POST["message"])) {
        $messageErr = "Le message est requis.";
    } else {
        $message = htmlspecialchars($_POST["message"]);
    }

    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $successMessage = "Message envoyé avec succès !";

    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <h1>Contactez-nous</h1>
    <?php if ($successMessage): ?>
        <p style="color: green;"><?php echo $successMessage; ?></p>
    <?php endif; ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Nom:</label><br>
        <input type="text" id="name" name="name" value="$name; ?>">
        <span style="color: red;"><?php echo $nameErr; ?></span><br><br>

        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="$email; ?>">
        <span style="color: red;"><?php echo $emailErr; ?></span><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message"><?php echo $message; ?></textarea>
        <span style="color: red;"><?php echo $messageErr; ?></span><br><br>

        <input type="submit" value="Envoyer">
    </form>
</body>
</html>