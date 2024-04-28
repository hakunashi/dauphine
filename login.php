<?php
require("utils/databaseManager.php");
$pdo = connectDB();

session_start();

if(isset($_SESSION["username"])){
    header("Location: ./admin/index.php");
}

$title = "Login";

$errors = [];

//si le form est rempli on test la validé des infromations
if ($_SERVER["REQUEST_METHOD"] === "POST" &&
isset($_POST["username"], $_POST["password"])) {
    //recuperation des info dans la bdd
    $user = findUser($pdo, $_POST["username"]);

    //si la reponse n'est pas false alors c'est que la requete a des correspondance
    if ($user !== false && password_verify($_POST["password"], $user["password"])) {
        //on rentre les informations dans la session
        $_SESSION["username"] = $_POST["username"];

        header("Location: ./admin/index.php");
    // sinon le retour de user contient false donc la requete n'a pas de corresponce
    }else {
        $errors["global"] = "Identifiants invalides";
    }
}


include_once("block/header.php");
?>

<main id="login_page">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

    <form method="POST">

        <label for="username">Username</label>
        <input type="text" name="username" id="username">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>

        <?php
        if (isset($errors["global"])) {
            echo ("<p class='text-danger'>" .
                $errors["global"] . "</p>");
        }
        ?>

        <input type="submit" value="Valider">
    </form>

</main>

<?php
include_once("block/footer.php");
?>