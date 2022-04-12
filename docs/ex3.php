<?php 
$nom = filter_input(INPUT_POST,"nom_complet");
$poste = filter_input(INPUT_POST,"intitulé_de_poste");
$entreprise = filter_input(INPUT_POST,"entreprise");
$email = filter_input(INPUT_POST,"email");
if ($nom !="" and $entreprise !="" and $poste !="" and $email!= ""): ?>
         <body>
          <style>
                body{
                    display: flex;
                }   
                .alaya{
                  
                    flex-wrap: columns;
                    align-self: center;
                    
                }
          </style>
          <div class="alaya">
            <h1> <?php $nom ?> </h1>
            <strong> <?php $poste ?> </strong>
            <strong> <?php $entreprise ?> </strong>
            <br>
            <p> <? $email ?> </p>
          </div>
      </body>  
      <?php endif; ?>    

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
        <form method= "POST" >
            <label for="nom_complet">nom complet</label><input type="text" name= "nom_complet"  id= "id_nom_complet">
            <div>
            <label for="intitulé_de_poste">intitulé de poste:</label> <input type="text" name= "intitulé_de_poste" id= "id_intitulé_de_poste">
            </div>
            <div>
            <label for="entreprise">Une entreprise (ou une école):</label> <input type="text" name= "entreprise" id= "id_entreprise">
            </div>
            <div>
            <label for="email">email:</label> <input type="email" name= "email" id= "id_email">
            </div>
            

            <input type="submit" name="submit">
        </form>