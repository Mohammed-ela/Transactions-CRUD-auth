<?php

// Récupérer l'URL demandée
$request_uri = $_SERVER['REQUEST_URI'];

// Créer un tableau de correspondances entre les URL et les fichiers PHP
$routes = array(
    '/' => './public/index.php',
    '/login' => './view/login.php',
    '/register' => './view/inscription.php'
);

// Vérifier si l'URL demandée correspond à une entrée dans le tableau des routes
if (array_key_exists($request_uri, $routes)) {
    $file_to_include = $routes[$request_uri];

    // Inclure le fichier correspondant
    include($file_to_include);
} else {
    // Gérer les cas où l'URL n'a pas de correspondance
    header('HTTP/1.0 404 Not Found');
    echo 'Page non trouvée';
}


?>
