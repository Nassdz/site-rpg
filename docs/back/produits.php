<?php
// require : Ca plante si le fichier n'est pas trouvé
// include : Ca fait juste un warning si le fichier n'est pas trouvé
// require et include prennent le contenu du fichier et le collent à l'arrache ici.

// truc.php c'est le code backend de la page
require('includes/produits.inc.php');

// header.php c'est le "haut" de la page HTML (balise head et tout)
require('partials/header.php');
?>
<h1><?= $titrePrincipal ?></h1>
<p><?= $contenuPrincipal ?></p>

<p>
    <?php include('partials/texte.txt'); ?>
</p>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prix</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($produits as $produit): ?>
        <tr>
            <td><?= $produit["nom"] ?></td>
            <td><?= $produit["prix"] ?> €</td>
            <td><?= $produit["description"] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php 
// footer.php c'est le "bas" de la page HTML (fin de balise body et html)
require('partials/footer.php'); ?>