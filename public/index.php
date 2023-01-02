<?php

require_once __DIR__ . '/../app/supprData.php';
require_once __DIR__ . '/../app/model/Livres.php';
require_once __DIR__ . '/../app/Utils/Database.php';

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../app/controller/MainController.php';
require_once __DIR__ . '/../app/controller/AjouterController.php';
require_once __DIR__ . '/../app/controller/ErrorController.php';


//Altorouteur

// on instancie la classe AltoRouter
$router = new AltoRouter();

// on doit dire à AltoRouter dans quel dossier se trouve notre app
// pour qu'il puisse "différencier" la route demandée par le visiteur du dossier dans lequel se trouve notre app
$router->setBasePath($_SERVER['BASE_URI']);

// on map nos routes !
$router->map('GET', '/',[
    'action' => 'home',
    'controller' => 'MainController'
]);

$router->map('GET', '/ajouter',[
    'action' => 'ajouter',
    'controller' => 'AjouterController',
]);

// on "match" la requête actuelle avec nos routes enregistrées précédemment
$match = $router->match();

// pour debug : 
// dd($match);

// si match = true, la route existe
if($match) {
    // comme avant, on veut récupérer le controleur à instancier 
    // et la méthode de ce controleur à appeler
    // sauf que ce coup-ci, on le fait grâce à AltoRouter !
    $controllerToInstantiate = $match['target']['controller'];
    $methodToCall = $match['target']['action'];

    // dispatcheur :
    $controller = new $controllerToInstantiate();
    // on appelle notre méthode, et on lui envoie les paramètres d'URL
    $controller->$methodToCall($match['params']);

} else {
    // 404, la route existe pas
    $controller = new ErrorController();
    $controller->error404();
}

//Fin altorouteur



//Pour debug
//var_dump($listLivre);


//TODO #1 A fix le tri croissant 
// Tri par ordre croissant soit du nom soit prenom soit titre
if (!empty($_GET['order'])){
    if ($_GET['order'] == 'nom'){
        $sql .= ' ORDER BY auteurNom';
    }
    elseif ($_GET['order'] == 'prenom'){
        $sql .= ' ORDER BY auteurPrenom';
    }
    elseif ($_GET['order'] == 'titre'){
        $sql .= ' ORDER BY Titre';
    }
};

//Suppression de livre

if (!empty($_GET['delete_id'])){
    supprData();
};

//Recherche dans la table
if(!empty($_GET['q'])){
    $rech = $_GET['q'];
    $sql.=" WHERE auteurNom LIKE '%$rech%' OR auteurPrenom LIKE '%$rech%' OR Titre LIKE '%$rech%'";
}




?>