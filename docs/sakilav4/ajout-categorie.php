<?php
// Vérifier si on est bien en POST ou pas avant de récupérer la donnée
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "name");
    
    // Vérifier que le $name n'est pas vide
    if($name) {
        // Nettoyer l'entrée utilisateur :
        // Méthode 1 : Retirer les balises HTML et PHP 
        $name = strip_tags($name);
        // Méthode 2 : Encoder les caractères 
        $name = htmlentities($name);
        
        require('includes/pdo.php');
        // Etape 1 : Préparer la requête
        $maRequete = $pdo->prepare("INSERT INTO category (name) VALUES(:name)");
        // Etape 2 : Exécuter la requête
        $maRequete->execute([
            ":name" => $name
        ]);
        // Y'a pas d'étape 3, c'est fini. Vu qu'on fait pas un SELECT
        http_response_code(302); // Found, c'est une redirection
        header('Location: categories.php');
        exit(); // Après une redirection, on appelle exit();

        // Rappels codes HTTP :
        // 1xx : Informations
        // 2xx : Succès
        // 3xx : Redirections
        // 4xx : Erreurs client
        // 5xx : Erreurs serveur
    }
} else {
    // Normalement on ne le laisse pas dans notre page, c'est juste pour l'exemple
    echo "On est en GET";
}
?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une catégorie</title>
</head>
<body>
    <h1>Ajouter une catégorie</h1>
    <form method="POST">
        <label for="category_name">Nom de la catégorie à ajouter :</label>
        <input type="text" id="category_name" name="name" />

        <input type="submit" value="Ajouter la catégorie" />
    </form>
</body>
</html>