<?php 
$nombre1 = filter_input(INPUT_POST,"nombre1");
$nombre2 = filter_input(INPUT_POST,"nombre2");
$cal = filter_input(INPUT_POST,"cal");
if ($nombre1 !="" and $nombre2 !="" and $cal !=""){
    if ($cal =="+"){
    $resultat = +$nombre1 + +$nombre2;}
    else if ($cal =="-"){
        $resultat = +$nombre1 - +$nombre2;}
    else if ($cal =="/"){
            $resultat = +$nombre1 / +$nombre2;}
    echo ($resultat);}
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
        <form method ="POST" >
            <label for="nombre1">nombre1: </label><input type="number" step=3 name= "nombre1"  id= "id_nombre1">
            <div>
            <label for="nombre2">nombre2:</label> <input type="number" step =2 name= "nombre2" id= "id_nombre2">
            </div>
            <div>
            <select name="cal">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="/">/</option>

            </select>
            </div>
            

            <input type="submit" name="submit">
        </form>