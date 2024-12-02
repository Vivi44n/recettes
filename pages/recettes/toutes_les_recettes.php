<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./assets/style/style.css" rel="stylesheet" />
</head>

<body>



<?php
include ('./include/header.php');
?>

<p>J'aime le PHP, c'est la vie</p>


<?php
echo ($maRoute[1]);
?>

<?php
echo '<form method="GET" action="?route=recettes">
            <input type="text" name="search" placeholder="Rechercher une recette..." value="' . htmlspecialchars($searchQuery) . '">
            <button type="submit">Rechercher</button>
          </form>';
          ?>


</body>

</html>