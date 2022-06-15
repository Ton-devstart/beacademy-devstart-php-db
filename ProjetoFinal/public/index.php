<?php

ini_set('display_errors', 1);

include '../vendor/autoload.php';

use App\Controller\ErrorController;

// use App\Connection\Connection;

// $connection = Connection::getConnection();

// $query = 'SELECT * FROM category;';

// $preparacao = $connection->prepare($query);
// $preparacao->execute();

// while ($registro = $preparacao->fetch()) {
//     var_dump($registro);
// }

//var_dump($preparacao->fetch());
##########################################################################################


$url = explode('?', $_SERVER['REQUEST_URI'])[0];

$routes = include '../config/routes.php';

if (false === isset($routes[$url])) {
    (new ErrorController())->notFoundAction();
    exit;
}

$controllerName = $routes[$url]['controller'];
$methodName = $routes[$url]['method'];

(new $controllerName())-> $methodName();


##########################################################################################

//var_dump($routes[$url]);

//if ($url === '/'){
//    $c = new IndexController();
//    $c->indexAction();
//    
//}  elseif ($url === '/login'){
//    $c = new IndexController();
//    $c->loginAction();
//
//}  elseif ($url === '/produtos'){
//    $p = new ProductController();
//    $p->listAction();
//
//}  else {
//    $e = new ErrorController();
//    $e->notFoundAction();
//}


//$c = new IndexController();
//$c->indexAction();
//$c->loginAction();

//$p = new ProductController();
//$p->listAction();
//$p->addAction();
//$p->editAction();

//$ca = new CategoryController();
//$ca->listAction();
//$ca->addAction();
//$ca->editAction();
