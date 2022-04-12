<?php
require('includes/pdo.php');

// A partir de là, on peut faire des requêtes
// Toujours de la même manière, 2 étapes (3 si SELECT)
// Etape 1 : Je prépare la requête
$maRequete = $pdo->prepare("SELECT * FROM actor");
// Etape 2 : J'exécute la requête
$maRequete->execute();
// Etape 3 : Je récupère le (fetch) ou les (fetchAll) résultat(s)
$acteurs = $maRequete->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acteurs</title>
</head>
<body>
    <h1>Acteurs</h1>
    <table>
        <thead>
            <tr>
                <th>Identifiant</th>
                <th>Prénom Nom</th>
                <th>Dernière modif</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($acteurs as $acteur): ?>
                <tr>
                    <td><?= $acteur["actor_id"] ?></td>
                    <td>
                        <a href="voir-acteur.php?id=<?= $acteur["actor_id"] ?>">
                            <?= $acteur["first_name"] ?> <?= $acteur["last_name"] ?>
                        </a>
                    </td>
                    <td><?= $acteur["last_update"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>