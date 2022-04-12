<?php
$theme = filter_input(INPUT_COOKIE, "theme");
var_dump($theme);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple cookies</title>
    <?php if($theme == "sombre"): ?>
    <link rel="stylesheet" media="all" type="text/css" href="theme-sombre.css" />
    <?php endif; ?>
</head>
<body>
    <h1>Bienvenue sur la page d'exemple des cookies</h1>

    <a href="changer-theme.php?theme=clair">Passer en thème clair</a>
    <a href="changer-theme.php?theme=sombre">Passer en thème sombre</a>
</body>
</html>