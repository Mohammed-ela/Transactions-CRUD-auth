<?php

// Fonction pour charger une vue
function loadView($view)
{
    include('../view/' . $view . '.php');
}
function loadCont($controller)
{
    include('../controller/' . $controller . '.php');
}
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request_uri = trim($request_uri, '/');
// echo($request_uri);

// Routeur
switch ($request_uri) {
    case 'public':
        loadView('home');
        break;

    case '':
        loadView('home');
        break;

    case 'login':
        loadView('login');
        break;

    case 'register':
        loadView('inscription');
        break;
    case 'transactions':
        loadView('transactions');
        break;
    case 'transactions/transactions':
        loadView('transactions');
        break;

       
    case 'logout':
        loadCont('user/logout');
        break;
    case 'transactions/create':
        loadView('transactions-register');
        break;
    case 'transactions/delete':
        loadCont('transactions/delete');
        break;
    
        







    default:
        loadView('error');
        break;
}
?>
