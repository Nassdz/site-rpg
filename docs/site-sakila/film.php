<?php
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "sakila";
$username = "root";
$password = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
$maRequete = $pdo->prepare("SELECT * FROM film");
$maRequete->execute();
$film = $maRequete->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>film</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                    <th>film_id</th>
                    <th>title</th>
                    <th>release_year</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($film as $film): ?>
            <tr>
                <td>
                    <?= $film["film_id"] ?>
                </td>
                <td> <a href="voir_film.php?id=<?= $film["film_id"] ?>"> <?= $film["title"] ?> </a>
                </td>
                <td>
                <?= $film["release_year"] ?>
                </td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
</body>
</html>
