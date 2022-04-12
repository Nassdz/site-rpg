<?php
require('includes/pdo.php')
//$myrequest = PDO->prepar();
//$myrequest->execte();
//$variable= myrequest->fetchall(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DOALL</title>
</head>
<body>
<form method="POST">
        <label for="category_name">Nom de la catégorie à ajouter :</label>
        <input type="text" id="category_name" name="name" />

        <input type="submit" value="Ajouter la catégorie" />
    </form>
    
</body>
</html>