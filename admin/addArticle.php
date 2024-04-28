<?php

include("../block/headerAdmin.php");

require("../utils/databaseManager.php");
$pdo = connectDB();

//Si arriver en POST creation du formulaire avec les entrées dans les input (sans verif si c'est vide pout le moment)

// A VOIR : La finctions move_uploaded_file renvoie un booleen, true si le transfert c'est fait false si il ne la pas fait. Cependant dans cette exo il ne me renvoie jamais true

if($_SERVER["REQUEST_METHOD"] === "POST" && (isset($_POST['contenu']) && isset($_POST['titre']))) {

    // $errors = [];

    // if ($_FILES['img']['size'] === 0) {
    //     $errors[] = 'Veuillez ajouter une image';
    // }

    // echo("il y a une image <br>");

    // // --------- EXTENTION FICHIER ----------

    // $extensions_autorisees = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];

    // if (!in_array($_FILES['img']['type'], $extensions_autorisees, true)) {
    //     $errors[] = 'Impossible : j\'accepte que les PNGS !';
    // }

    // // --------- TAILLE FICHIER ----------
    // if ($_FILES['img']['size'] > 100000000) {
    //     $errors[] = 'Fichier trop lourd impossible';
    // }

    // if (count($errors) === 0) {

    //     $extension = explode('/', $_FILES['img']['type'])[1];

    //     // Création d'un nouveau nom pour ne ne pas avoir de doublons
    //     $imageUrl = uniqid('', true) . '.' . $extension;


    //     // Upload du fichier de la requete à notre Serveur dans le dossier "uploads"
    //     move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/' . $imageUrl);

    //     if(move_uploaded_file($_FILES['img']['tmp_name'], '../uploads/' . $imageUrl)) {
    //         echo("l'image a bien ete envoyer dans le dossier");
    //     } else {
    //         echo("l'image n'est pas dans le dossier");
    //     }

    //     //addNewArticle($pdo, $_POST['contenu'], $_POST['titre'], $_SESSION['username'], $imageUrl);
    //     //index que si OK
    //     //header("location: ./index.php");
    // }

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
        <input type="text" name="titre" id="titre" require>
        <label for="contenu">Contenu</label>
        <textarea name="contenu" id="contenu" cols="30" rows="10" require></textarea>
        <input type="submit" value="Ajouter">
    </form>

</main>

<?php
include("../block/footer.php");
?>