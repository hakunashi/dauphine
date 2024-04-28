<?php

function connectDB(): PDO
{
    try {

        $host = "localhost";
        $databaseName = "dauphineexam";
        $user = "root";
        $password = "";

        $pdo = new PDO("mysql:host=" . $host . ";port=3306;dbname=" . $databaseName . ";charset=utf8", $user, $password);

        configPdo($pdo);

        return $pdo;
    } catch (Exception $e) {

        //Lancer l'erreur
        //throw $e;

        echo ("Erreur à la connexion: " .  $e->getMessage());

        exit();
    }
}

function configPdo(PDO $pdo): void
{
    // Recevoir les erreurs PDO ( coté SQL )
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Choisir les indices dans les fetchs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

//recupérer tous les articles
function findAllArticles(PDO $pdo): array
{
    $query = $pdo->prepare('SELECT * FROM annonce');
     $query->execute();
     return $query->fetchAll();
}

//recupérer un articles avec son id
function findArticleById(PDO $pdo, $id): array
{
    $query = $pdo->prepare('SELECT * FROM annonce WHERE id = :id');
    $query->execute([
        ":id" => $id
    ]);
    return $query->fetch();
}

//ajout nouvelle article
function addNewArticle(PDO $pdo, $contenu, $titre, $auteur) {
    $query = $pdo->prepare("INSERT INTO annonce(imageUrl, contenu, titre, auteur, datePublication) VALUES ('https://ralfvanveen.com/wp-content/uploads/2021/06/Espace-r%C3%A9serv%C3%A9-_-Glossaire-1200x675.webp',:contenu,:titre,:auteur, NOW())");
    $query->execute([
        ":contenu" => $contenu,
        ":titre" => $titre,
        ":auteur" => $auteur
    ]);
}

//mise a jour article
function updateArticle(PDO $pdo, $contenu, $titre, $id) {
    $query = $pdo->prepare('UPDATE annonce SET contenu = :contenu, titre = :titre, datePublication = NOW() WHERE id = :id');
    $query->execute([
        ":contenu" => $contenu,
        ":titre" => $titre,
        ":id" => $id
    ]);
}

//suppression article
function deleteArticle(PDO $pdo, $id) {
    $query = $pdo->prepare('DELETE FROM annonce WHERE id = :id');
        $query->execute([
            ":id" => $id
        ]);
}

//trouver correspondance des user avec les la bdd
function findUser(PDO $pdo, $username)
{
    $response = $pdo->prepare("SELECT username, password FROM utilisateur WHERE username = :username");
    $response->execute([
        ":username" => $username
    ]);
    return $response->fetch();
}
