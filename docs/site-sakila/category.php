<?php
// Nous aurons toujours besoin de ces six (5) informations pour nous connecter.
// Moteur de bases de données (mysql)
// Host de la BDD (localhost)
// Port de la BDD (par défaut 3306, 8889 sous Mac avec MAMP)
// Nom de la base de données (db_aviation / sakila, facultative)
// Nom d'utilisateur (root)
// Mot de passe (par défaut root, "" sous Windows avec WAMP)

// Deux méthodes :
// Méthode 1 : Tout écrire entre les parenthèses de PDO
// $pdo = new PDO("mysql:host=localhost:3306;dbname=sakila", "root", "root");

// Méthode 2 : Créer des variables et les utiliser entre les parenthèses de PDO
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "sakila";
$username = "root";
$password = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);

// Maintenant qu'on est connectés, on va pouvoir faire des requêtes SQL
// Ca fonctionne toujours pareil
// Etape 1 : On prépare la requête
$maRequete = $pdo->prepare("SELECT * FROM category");
// Etape 2 : On exécute la requête
$maRequete->execute();
// Etape 3 : Si c'est un SELECT, on récupère LE (fetch) ou LES (fetchAll) résultatS
// PDO::FETCH_ASSOC va ramener uniquement les noms de colonnes
$categories = $maRequete->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Sakila - Catégories</title>
    </head>
    <body>
        <h1>Catégories</h1>
        <table>
            <thead>
                <tr>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Dernière modif</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($categories as $categorie): ?>
                    <tr>
                        <td><?= $categorie["category_id"] ?></td>
                        <td>
                            <a href="voir-categorie.php?id=<?= $categorie["category_id"] ?>">
                                <?= $categorie["name"] ?>
                            </a>
                        </td>
                        <td><?= $categorie["last_update"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>