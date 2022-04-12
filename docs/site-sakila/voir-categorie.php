<?php

// Rappel : filter_input permet de récupérer des données entrantes (ici en GET)
// FILTER_VALIDATE_INT permet de ne récupérer que des nombres entiers
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

// Nous aurons toujours besoin de ces six (5) informations pour nous connecter.
// Moteur de bases de données (mysql)
// Host de la BDD (localhost)
// Port de la BDD (par défaut 3306, 8889 sous Mac avec MAMP)
// Nom de la base de données (db_aviation / sakila, facultative)
// Nom d'utilisateur (root)
// Mot de passe (par défaut root, "" sous Windows avec WAMP)

// Créer des variables et les utiliser entre les parenthèses de PDO
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "sakila";
$username = "root";
$password = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
$maRequete = $pdo->prepare("SELECT * FROM category WHERE category_id = :id");
$maRequete->execute([":id" => $id]);
$maRequete->setFetchMode(PDO::FETCH_ASSOC);
$categorie = $maRequete->fetch();

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
$maRequete2 = $pdo->prepare("SELECT * FROM film f JOIN film_category fc ON f.film_id = fc.film_id WHERE fc.category_id = :id");
$maRequete2->execute([":id" => $id]);
$categorie2 =$maRequete2->fetchAll(PDO::FETCH_ASSOC);

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
    <h1><?= $categorie["name"] ?></h1>
    <em>Dernière mise à jour : <?= $categorie["last_update"] ?></em>
    <table>
            <thead>
                <tr>
                    <th>
                        title
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categorie2 as $categorie2): ?>

                <tr>
                    <td><?= $categorie2["title"]?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
    </table>
        
</body>
</html>