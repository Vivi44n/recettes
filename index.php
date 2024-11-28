<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include './headerfooter\header.php';


// Routeur qui va rediriger l'utilisateur vers un fichier en fonction de l'URL
$maRoute = explode('/', $_GET['route']);

if ($maRoute[0] == "accueil" || $maRoute[0] == "") {
    include("./pages/accueil.html");
} else if ($maRoute[0] == "recettes") {
    if (!isset($maRoute[1]) || $maRoute[1] == "toutes" || $maRoute[1] == "") {
        include("./pages/recettes/toutes_les_recettes.html");
    } else if (is_numeric($maRoute[1])) {
        $id_recette_demande = $maRoute[1];

        // Connexion à la base de données
        require("./db/connexion.php");

        // Récupération des informations de la recette
        $sql = "SELECT * FROM recette WHERE id_recette = :id_recette";
        $query = $pdo->prepare($sql);
        $query->execute([":id_recette" => $id_recette_demande]);
        $data = $query->fetch();

        if ($data) {
            $nomRecette = $data["nom"];
            include("./pages/recettes/une_recette.php");
        } else {
            echo "Aucune recette trouvée.";
        }

        // Récupération des ingrédients liés à la recette
        $sql = "SELECT * FROM ingredient WHERE id_recette = :id_recette";
        $query = $pdo->prepare($sql);
        $query->execute([":id_recette" => $id_recette_demande]);
        $ingredients = $query->fetchAll();

        if ($ingredients) {
            foreach ($ingredients as $ingredient) {
                echo $ingredient["nom"] . "<br>";
            }
        } else {
            echo "Aucun ingrédient pour cette recette.";
        }
    } else {
        include("./pages/404notfound.html");
    }
} else {
    include("./pages/404notfound.html");
}
?>
