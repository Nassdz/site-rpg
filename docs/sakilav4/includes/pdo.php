<?php
// Moteur de base de données : mysql
$engine = "mysql";
// Hôte (hostname, IP, ...) : localhost
$host = "localhost";
// Port : 3306 (par défaut), 8889 (sous Mac avec MAMP)
$port = 3306;
// Nom de la base de données  (facultatif) : sakila
$dbname = "sakila";
// Utilisateur : root
$username = "root";
// Mot de passe : root (par défaut), "" (sous Windows avec WAMP)
$password = "root";
$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);