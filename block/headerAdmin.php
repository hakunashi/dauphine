<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
      <title><?php echo ($title ?? "Default Title") ?></title>
      
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

      <link rel="stylesheet" href="../style.css">
</head>

<body>

<?php
    //mes url ne fonctionne pas alors redirection avec les chemin
    //redirection si pas de session name
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../login.php");
    }
?>

<nav> 
    <ul>
        <li>
            <a href="./index.php">Admin article</a>
        </li>
        <li>
            <a href="./addArticle.php">Ajouter un article</a>
        </li>
        <li>
            <a href="./logout.php">Déconnexion</a>
        </li>
    </ul>
</nav>