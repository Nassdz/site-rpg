<?php
 $liens=[
    "Produits" => "produits.php",
    "Contact" => "contact.php"
 ];
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <nav>
     <ul>
         <?php foreach( $liens as $name => $lien): ?>
          <li><a href="<?= $lien ?>"><?=$name ?></a></li>
          <?php endforeach; ?>
     </ul>
 </nav>