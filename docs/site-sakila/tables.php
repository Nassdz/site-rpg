<?php
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "sakila";
$username = "root";
$password = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
$maRequete = $pdo->prepare("show tables");
$maRequete->execute();
$tables = $maRequete->fetchAll(PDO::FETCH_ASSOC);
$name = filter_input(INPUT_POST,"name");
if ($name != "") {
    echo"walid";
    http_response_code(302);
    header("Location: $name.php");
    exit();
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Sakila - Catégories</title>
    </head>
    <body>
        <div class="navbar">
            <link rel="stylesheet" href="style.css">
             <a href="tables.php"><h2>tables</h2></a>
             <a href="actor.php">Actors</a>
             <a href="film.php">Films</a>
             <a href=""></a>
        </div>
        <h1>Catégories</h1>
        <table>
            <thead>
                <tr>
                    <th>table</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tables as $tables): ?>
                    <tr>
                        <td>
                            <a href="<?= $tables["Tables_in_sakila"] ?>.php">
                                <?= $tables["Tables_in_sakila"] ?>
                            </a>
                        </td>
                     
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form method="POST">
            <label for="category_name">Nom de la catégorie à ajouter :</label>
            <input type="text" id="category_name" name="name" />

            <input type="submit" value="Créer la catégorie" />
        </form>
    </body>
</html>