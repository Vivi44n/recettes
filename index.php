

<?php


ini_set('display_errors', 1);
error_reporting(E_ALL);

include ('./db/connexion_bdd.php');
include ('./assets/style/style.css');


$searchQuery = trim($_GET['search'] ?? '');
$recettes = [];

if ($searchQuery) {
    $sql = "SELECT * FROM recette WHERE LOWER(nom) LIKE LOWER(:search)";
    $query = $pdo->prepare($sql);
    $query->execute([':search' => '%' . $searchQuery . '%']);
    $recettes = $query->fetchAll();
}

$maRoute = explode('/', $_GET['route'] ?? '');

if (empty($maRoute[0]) || $maRoute[0] == "accueil") {
    include("./pages/accueil.php");
} elseif ($maRoute[0] == "recettes") {
    include("./pages/recettes/toutes_les_recettes.php");


          echo '<p>urfhuodfh</p>';

    if ($searchQuery) {
        if ($recettes) {
            echo "<h2>Résultats de la recherche pour: " . htmlspecialchars($searchQuery) . "</h2>";
            foreach ($recettes as $recette) {
                echo '<a href="?route=recettes/' . $recette['id_recette'] . '">' . htmlspecialchars($recette['nom']) . '</a><br>';
            }
        } else {
            echo "Aucune recette trouvée pour '" . htmlspecialchars($searchQuery) . "'.";
        }
    }

    // Affichage de toutes les recettes ou d'une recette spécifique
    if (empty($maRoute[1]) || $maRoute[1] == "toutes") {
        include("./pages/recettes/toutes_les_recettes.html");
    } elseif (is_numeric($maRoute[1])) {
        $id_recette_demande = $maRoute[1];

        // Récupération de la recette demandée
        $sql = "SELECT * FROM recette WHERE id_recette = :id_recette";
        $query = $pdo->prepare($sql);
        $query->execute([":id_recette" => $id_recette_demande]);
        $data = $query->fetch();

        if ($data) {
            $nomRecette = $data["nom"];
            include("./pages/recettes/une_recette.php");

            // Récupération des ingrédients de la recette
            $sql = "SELECT * FROM ingredient WHERE id_recette = :id_recette";
            $query = $pdo->prepare($sql);
            $query->execute([":id_recette" => $id_recette_demande]);
            $ingredients = $query->fetchAll();

            if ($ingredients) {
                foreach ($ingredients as $ingredient) {
                    echo htmlspecialchars($ingredient["nom"]) . "<br>";
                }
            } else {
                echo "Aucun ingrédient pour cette recette.";
            }
        } else {
            echo "Aucune recette trouvée.";
        }
    }
}
include './include/footer.php';

?>

