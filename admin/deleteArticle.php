<?php

$title = "Suppression";

include("../block/headerAdmin.php");

require("../utils/databaseManager.php");
$pdo = connectDB();

//entrer en POST?
if($_SERVER["REQUEST_METHOD"] === "POST") {
    //suppression si submit "valider"
    if($_POST['use'] == "valider") {
        deleteArticle($pdo, $_POST['id']);
    }

    header("location:./index.php");
}

$article = findArticleById($pdo, $_GET["id"]);

$title = "Suppression de l'article : " . $article["titre"];
?>

<main class="container admin-page-container">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>
    <p>Voulez vous vraiment supprimer l'article <span><?php echo $article["titre"] ?></span> ?</p>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
        <input id="valider" type="submit" name="use" value="valider">
        <input id="annuler" type="submit" name="use" value="annuler">
    </form>

</main>

<?php
include_once("../block/footer.php");
?>