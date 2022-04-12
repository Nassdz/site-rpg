<?php
require("login.php");
$request = $pdo->prepare("show tables");
$request->execute();
$list = $request->fetchAll(PDO::FETCH_ASSOC);
$supprimer= filter_input(INPUT_GET,"supid");
if($supprimer){
    $delreq= $pdo ->prepare("DROP TABLE $supprimer");
    $delreq->execute();
    http_response_code(302);
    header('Location: liste.php');
};
$add=filter_input(INPUT_POST,"walid");
if($add){
    $addreq= $pdo ->prepare("create table $add (l char(1));");
    $addreq->execute();
    http_response_code(302);
    header('Location: liste.php');
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste</title>
</head>
<body>
    <h1>Liste</h1>
    <table>
        <thead>
            <tr>
                <th>Tables</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($list as $list): ?>
            <tr>
                <td><a href="detail.php?id=<?= $list["Tables_in_sakila"] ?>"><?= $list["Tables_in_sakila"] ?></a></td>
                <td><a href="liste.php?supid=<?= $list["Tables_in_sakila"] ?>">Supprimer</a></td>
            </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <form method="POST">
        Table name<input type="text" name="walid">
        <input type="submit" name="ss" value="add table">
    </form>
</body>
</html>