<?php 
$prenom = filter_input(INPUT_GET,"prenom");
$nom = filter_input(INPUT_GET,"nom");
$age = filter_input(INPUT_GET,"age");
if ($nom !="" and $prenom !="" and $age !=""){
echo ("prenom:".$prenom."<br>"."nom:".$nom."<br>"."age:".$age);}
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
        <form >
            <label for="prenom">prenom: </label><input type="text" name= "prenom"  id= "id_prenom">
            <div>
            <label for="nom">nom:</label> <input type="text" name= "nom" id= "id_nom">
            </div>
            <div>
            <label for="age">age:</label> <input type="number" name= "age" id= "id_age">
            </div>
            

            <input type="submit" name="submit">
        </form>