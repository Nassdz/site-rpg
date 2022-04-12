<?php
// Cette fonction magique :
// - Créer un identifiant pour la personne si elle n'en a pas
// - L'envoyer avec Set-Cookie
// - Créer un fichier pour cette personne sur le serveur
session_start();

$login = filter_input(INPUT_POST, "login");
$password = filter_input(INPUT_POST, "password");
$status = filter_input(INPUT_POST,"disconnect");
if($status){
   var_dump($status);
}

if($login == "admin" && $password == "admin") {
    $_SESSION["connecte"] = true;
    $_SESSION["login"] = $login;
    http_response_code(302);
    header('Location: dashboard.php');
    exit();
}

// Variable de session, qui contient ce que contient le fichier
var_dump($_SESSION);
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <h1>Connexion</h1>
    <form method="POST">
        <label for="login">Identifiant</label>
        <input type="text" name="login" id="login" /><br/>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" /><br/>

        <input type="submit" name="Se connecter" value="Se connecter" />
        <input type="submit" name="disconnect" value="disconnect">
    </form>
</body>
</html>