<?php
// Pour supprimer une catégorie, on a besoin de :
// - Un identifiant (en GET, sous la forme ?id=1)
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
// - Une requête pour supprimer
if($id) {
    require('includes/pdo.php');

    // Etape 1 : Je prépare ma requête
    $maRequete = $pdo->prepare("DELETE FROM category WHERE category_id = :id");
    // Etape 2 : J'exécute ma requête
    $maRequete->execute([
        ":id" => $id
    ]);
    // Y'a pas d'étape 3, parce qu'on ne fait pas de SELECT
}
// - Rediriger l'utilisateur vers la page des catégories
http_response_code(302); // Found, c'est une redirection
header('Location: categories.php');
exit(); // Après une redirection, on appelle exit();

// Même pas besoin de HTML !