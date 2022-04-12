<?php
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "sakila";
$username = "root";
$password = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
$maRequete = $pdo->prepare("SELECT * FROM actor");
$maRequete->execute();
$actor = $maRequete->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>actor</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                    <th>actor_id</th>
                    <th>actor</th>
                    <th>last_update</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($actor as $actor): ?>
            <tr>
                <td>
                    <?= $actor["actor_id"] ?>
                </td>
                <td> <a href="voir_actor.php?id=<?= $actor["actor_id"] ?>">
                                <?= $actor["first_name"] ?> <?= $actor["last_name"] ?> </a>
                </td>
                <td>
                <?= $actor["last_update"] ?>
                </td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
</body>
</html>
