<?php
// Type de base de données
$engine = "mysql";

// IP
$host = "localhost";

// Port (par défaut, 3306)
$port = 3306;

// Nom de la base de données (facultatif)
$dbName = "sakila";

// Nom d'utilisateur
$username = "root";

// Mot de passe
$password = "root";

// PDO : PHP Data Objects
// A quoi ça sert ? Ca permet de faire des requêtes SQL et de récupérer des résultats sous forme
// de variables PHP (tableaux ou objets)
// C'est un système qui est "agnostique" : il s'en fiche que ce soit SQL Server ou PostGre SQL ou MySQL
// Il permet de sécuriser vos requêtes
// DSN : Data Source Name
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName", $username, $password);
// $pdo = new PDO("mysql:host=localhost:3306;dbname=sakila", "root", "root");

echo "On est connectés à la base de données";

// Etape 1 : On prépare la requête
// Statement, variable de type PDOStatement
$statement = $pdo->prepare("SELECT * FROM actor");

// Etape 2 : On exécute la requête
$statement->execute();

// Etape 3 (uniquement si on fait un SELECT) : On récupère LES résultatS
// $actors = $statement->fetchAll();
// Si on veut récupérer UN résultat, on utilise fetch()
// $statement->fetch();
$actors = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Acteurs et actrices</title>
    </head>
    <body>
        <h1>Acteurs et actrices</h1>
        <table>
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Date de dernière modif</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($actors as $actor): ?>
                    <tr>
                        <td><?= $actor["actor_id"] ?></td>
                        <td><?= $actor["first_name"] ?></td>
                        <td><?= $actor["last_name"] ?></td>
                        <td><?= $actor["last_update"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>