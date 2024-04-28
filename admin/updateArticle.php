<?php

include("../block/headerAdmin.php");

require("../utils/databaseManager.php");
$pdo = connectDB();

if($_SERVER["REQUEST_METHOD"] === "POST") {

    $query = $pdo->prepare('UPDATE annonce SET contenu = :contenu, titre = :titre, datePublication = NOW() WHERE id = :id');
    $query->execute([
        ":contenu" => $_POST['contenu'],
        ":titre" => $_POST['titre'],
        ":id" => $_POST['id']
    ]);

    updateArticle($pdo, $_POST['contenu'], $_POST['titre'], $_POST['id']);

    header("location:./index.php");
}

$article = findArticleById($pdo, $_GET["id"]);

$title = "Mise a jour de l'article : " . $article["titre"];
?>

<main class="container admin-page-container">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

    <form method="POST">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="<?php echo $article['titre'] ?>">
        <label for="contenu">Contenu</label>
        <textarea name="contenu" id="contenu" cols="30" rows="10"><?php echo $article['contenu'] ?></textarea>
        <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
        <input type="submit" value="Modifier">
    </form>

</main>

<?php
include("../block/footer.php");
?>