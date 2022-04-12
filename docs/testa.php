
<?php
// Explication entre == et ===
$a = "1"; // Chaîne de caractères
$b = 1; // Nombre
if($a == $b) { // "1" == 1 => "1" == "1" => Vrai
    // Oui, c'est vrai.
}
if($a === $b) { // Text est de même type qu'un nombre ? Non.

} else {
    // Non, c'est faux.
}
var_dump(1000 == "1e3");

// Début de l'exercice : traitement de l'information
$prenom = filter_input(INPUT_GET, 'prenom');
$motdepasse = filter_input(INPUT_GET, 'motdepasse');
$nombre = filter_input(INPUT_GET, 'nombre', FILTER_VALIDATE_FLOAT);

var_dump($prenom, $motdepasse, $nombre);
// Avec filter_input, vous avez trois possibilités :
// - Soit ça renvoie NULL quand la donnée n'est pas envoyée
// - Soit ça renvoie false quand la donnée ne correspond pas à la demande
// - Soit ça renvoie la valeur
if($prenom === "") {
    $erreur = "Ah bon il a pas de prénom ?";
} else if($prenom) {
    // Faire un traitement particulier
}
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Exemple de formulaire</title>
        <style>
            /*
            #form1 {
                display: grid;
                grid-template-columns: auto 1fr;
                grid-column-gap: 1em;
            }
            */
        </style>
    </head>
    <body>
        <?php if($erreur): ?>
            <div class="error">
                <p><?= $erreur ?></p>
            </div>
        <?php endif; ?>
        <form>
            <label for="id_prenom">Prénom :</label><input type="text" name="prenom" id="id_prenom" />
            
            Mot de passe : <input type="password" name="motdepasse" /><br/>
            Nombre : <input type="number" min="0" max="20" step="0.25" name="nombre" /><br/>
            Votre fruit préféré ?<br/>
            <input type="radio" name="fruit" value="pomme" /> Pomme<br/>
            <input type="radio" name="fruit" value="poire" /> Poire<br/>
            <input type="radio" name="fruit" value="fraise" /> Fraise<br/>
            <input type="radio" name="fruit" value="non" /> J'aime pas les fruits<br/>
            Quels fruits aimez-vous ?<br/>
            <input type="checkbox" name="fruit_pomme" /> Pomme<br/>
            <input type="checkbox" name="fruit_poire" value="1" /> Poire<br/>
            <input type="checkbox" name="fruit_fraise" value="1" /> Fraise<br/>
            <input type="checkbox" name="fruit_non" value="1" /> J'aime pas les fruits<br/>

            Téléphone : <input type="tel" /><br/>
            Email : <input type="email" /><br/>

            Jour : <input type="date" /><br/>
            Heure : <input type="time" /><br/>
            Couleur : <input type="color" /><br/>

            Vous êtes combien ?
            <select name="position">
                <option value="1">Premier(e)</option>
                <option value="2">Deuxième</option>
                <option value="3">Troisième</option>
                <option value="4">Quatrième</option>
            </select>

            <input type="submit" value="Envoyer" />
        </form>
    </body>
</html>