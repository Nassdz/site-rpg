<?php
// filter_input permet de récupérer les données entrantes (ici en GET avec INPUT_GET)
// On récupère la donnée envoyées sous la forme voir-acteur.php?id=10
// FILTER_VALIDATE_INT nous assure que c'est un nombre entier
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

require('includes/pdo.php');

// Etape 1 : Je prépare la requête
// :id c'est ce qu'on appelle un "placeholder", une sorte d'endroit réservé pour mettre une variable plus tard
$maRequete = $pdo->prepare("SELECT * FROM actor WHERE actor_id = :id");
// Etape 2 : J'exécute la requête
$maRequete->execute([
    ":id" => $id
]);
// Etape 3 : Je récupère LE résultat
$acteur = $maRequete->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir l'acteur ou l'actrice</title>
</head>
<body>
    <h1><?= $acteur["first_name"] ?> <?= $acteur["last_name"] ?></h1>
    <em>Date de dernière modif : <?= $acteur["last_update"] ?></em>
</body>
</html>