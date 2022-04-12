<?php
// changer-theme.php?theme=clair
// changer-theme.php?theme=sombre
// --> Définisse un cookie avec theme=clair ou theme=sombre
$theme = filter_input(INPUT_GET, "theme");
if($theme == "clair") {
    setcookie("theme", "clair");
} else if($theme == "sombre") {
    setcookie("theme", "sombre");
}

// On redirige vers la page des cookies
http_response_code(302);
header('Location: cookies.php');
exit();