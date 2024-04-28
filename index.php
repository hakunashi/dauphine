<?php
$title = "Dauphine";

include_once("block/header.php");

//tableau des articles
require_once("utils/databaseManager.php");
$pdo = connectDB();
$articles = findAllArticles($pdo);
?>

<main>

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

    <section>
        <?php
            //afficher tous les articles
            foreach ($articles as $value) {
        ?>
        
        <article >
            <h2> <?php echo $value["titre"] ?> </h2>
            <div style="max-height: 330px;" class="content_container">
                <div class="img_container">
                    <img src='<?php echo $value["imageUrl"] ?>' alt="">
                </div>
                <div class="text_container">
                    <p> <?php echo $value["contenu"] ?> </p>
                <legend> by <?php echo $value["auteur"] ?> </legend>
                </div>
            </div>
        </article>

        <?php
            }
        ?>
    </section>

</main>

<?php
include_once("block/footer.php");
?>