<?php
session_start();
if(!$_SESSION["connecte"]) {
    http_response_code(302);
    header('Location: login.php');
    exit();
}
$status = filter_input(INPUT_POST,"disconnect");
var_dump($status);
if($status){
    $_SESSION["connecte"] = FALSE;
    http_response_code(302);
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <form method="POST" >
        <input type="submit" name="disconnect" value="disconnect">
    </form>
    <h1>Bienvenue sur votre dashboard</h1>
    <p>Vous êtes connecté(e), <?= $_SESSION["login"] ?></p>
</body>
</html>