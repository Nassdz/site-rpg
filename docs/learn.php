<?php
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbName = "sakila";
$username = "root";
$password = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbName", $username, $password);
echo "Hallo";
$statement = $pdo->prepare("SELECT * FROM actor");
$statement->execute();
$actors = $statement->fetchAll(PDO::FETCH_ASSOC);
$query = $pdo ->prepare("SELECT * FROM CITY");
$query->execute();
$city = $query ->fetchAll(PDO::FETCH_ASSOC);
$querya = $pdo ->prepare("SELECT * FROM COUNTRY");
$querya->execute();
$country = $querya ->fetchall(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Actors and cities</title>
        
    </head>
    <body>
        <h1>Actors and cities</h1>
        <div class="walid">
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
            <table >
                <thead>
                    <tr>
                        <th>city_id</th>
                        <th>city</th>
                        <th>country_id</th>
                        <th>last_update</th>
                    </tr>
                    <?php foreach($city as $city): ?>
                    <tr>
                        <td> <?= $city["city_id"] ?></td>
                        <td> <?= $city["city"] ?></td>
                        <td> <?= $city["country_id"] ?></td>
                        <td> <?= $city["last_update"] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </thead>
            </table>
        </div>
        <TABLE>
            <thead>
                <tr>
                    <th>country_id</th>
                    <th>country</th>
                    <th>last_upadate</th>
                </tr>
                <?php foreach($country as $country): ?>
                <tr>
                    <td> <?= $country["country_id"] ?> </td>
                    <td> <?= $country["country"] ?> </td>
                    <td> <?= $country["last_update"] ?> </td>
                </tr>
                <?php endforeach; ?>
                
                
            </thead>
        </TABLE>
        <style>
            table, th, td{
                border: 1px solid;
                }
                .walid{
                        display: flex;
                        justify-content: space-around;
                    }
        </style>
    </body>
</html>