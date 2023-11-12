<?php

// Fonction pour charger une vue
function loadView($view)
{
    include('../view/' . $view . '.php');
}
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = trim($request_uri, '/');

// Routeur
switch ($request_uri) {
    case '':
        loadView('home');
        break;

    case 'login':
        loadView('login');
        break;

    case 'register':
        loadView('inscription');
        break;

    default:
        loadView('error');
        break;
}
?>
