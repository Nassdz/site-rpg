<?php
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "sakila";
$username = "root";
$password = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);

$maRequete = $pdo->prepare("SELECT * FROM film WHERE film_id = :id");
$maRequete->execute([
    ":id" => $id
]);
// Etape 3 : Récupérer LE résultat si c'est un SELECT
$maRequete->setFetchMode(PDO::FETCH_ASSOC);
$film = $maRequete->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir la catégorie</title>
</head>
<body>
    <h1><?= $film["title"] ?></h1>
    <em>release_year : <?= $film["release_year"] ?></em>
</body>
</html>