<?php
require('includes/pdo.php');

// A partir de là, on peut faire des requêtes
// Toujours de la même manière, 2 étapes (3 si SELECT)
// Etape 1 : Je prépare la requête
$maRequete = $pdo->prepare("SELECT * FROM category");
// Etape 2 : J'exécute la requête
$maRequete->execute();
// Etape 3 : Je récupère le (fetch) ou les (fetchAll) résultat(s)
$categories = $maRequete->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catégories</title>
</head>
<body>
    <h1>Catégories</h1>
    <table>
        <thead>
            <tr>
                <th>Identifiant</th>
                <th>Nom</th>
                <th>Dernière modif</th>
                <th>Suppression ?</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categories as $categorie): ?>
                <tr>
                    <td><?= $categorie["category_id"] ?></td>
                    <td>
                        <a href="voir-categorie.php?id=<?= $categorie["category_id"] ?>">
                            <!-- Méthode 3 : Protéger l'affichage -->
                            <!-- <?= htmlentities($categorie["name"]) ?> -->
                            <?= $categorie["name"] ?>
                        </a>
                    </td>
                    <td><?= $categorie["last_update"] ?></td>
                    <td>
                        <a href="supprimer-categorie.php?id=<?= $categorie["category_id"] ?>">
                            Supprimer
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="ajout-categorie.php">Ajouter une catégorie</a>
</body>
</html>