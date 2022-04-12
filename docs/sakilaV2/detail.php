<?php
$id = filter_input(INPUT_GET,"id");
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "sakila";
$username = "root";
$password = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);

$maRequete2 = $pdo->prepare("SELECT * FROM $id ");
$maRequete2->execute();
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
    <h1>Liste</h1>
    <table>
        <thead>
            <tr>
                <th>Tables</th>
            </tr>
            <?php foreach($categorie2 as $dd): ?>
                <p><?= $dd["actor_id"] ?></p>
                <?php endforeach; ?>
        </thead>
        <tbody>
      
        </tbody>
    </table>
</body>
</html>