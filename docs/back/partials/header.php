<?php
$liens = [
    "Produits" => "produits.php",
    "Contact" => "contact.php"
];
?><!doctype html>
<html lang="fr">
    <head>
        <title><?= $titrePrincipal ?></title>
        <meta charset="utf-8">
        <?php include('partials/style.html'); ?>
    </head>
    <body>
        <nav>
            <ul>
                <?php foreach($liens as $libelle => $lien): ?>
                    <li><a href="<?= $lien ?>"><?= $libelle ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>