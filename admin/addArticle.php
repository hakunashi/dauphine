<?php

include("../block/headerAdmin.php");

require("../utils/databaseManager.php");
$pdo = connectDB();

//Si arriver en POST creation du formulaire avec les entrées dans les input (sans verif si c'est vide pout le moment)
if($_SERVER["REQUEST_METHOD"] === "POST") {
    addNewArticle($pdo, $_POST['contenu'], $_POST['titre'], $_SESSION['username']);

    header("location:./index.php");
}

/*
// uploads image non fonctionnel
if (isset($_FILES['img']) AND $_FILES['img']['error'] == 0) {
    if ($_FILES['img']['size'] <= 1000000)
    {
        $infosfichier = $_FILES['img'];
        $extension = $infosfichier['type'];
        $extensions_autorisees = array('image/jpg', 'image/jpeg', 'iamge/png');
        if (in_array($extension, $extensions_autorisees)){
            $image_upload = "../uploads/" . basename($_FILES['img']['name']);

            move_uploaded_file($_FILES['img']['tmp_name'], $image_upload);

            echo "L'envoi a bien été effectué !";
        } else {
            echo('J\'accepte que les images ...');
        }
    } else {
        echo('le fichier est trop lourd pour un petit serveur ... ');
        }
}
*/

$title = "Ajout nouvelle article";
?>

<main class="container admin-page-container">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

    <form method="POST" enctype="multipart/form-data">
        <!-- <input type="file" name="img"> -->
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" value="<?php echo $article['titre'] ?>">
        <label for="contenu">Contenu</label>
        <textarea name="contenu" id="contenu" cols="30" rows="10"><?php echo $article['contenu'] ?></textarea>
        <input type="submit" value="Ajouter">
    </form>

</main>

<?php
include("../block/footer.php");
?>