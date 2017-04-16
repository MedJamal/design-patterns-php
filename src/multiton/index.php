<?php

/**
 * Exemple du design pattern "Multiton".
 *
 * Ce design pattern ressemble au design pattern "Singleton"
 * à la différence que avec le Multiton on peut effectuer plusieurs instances d'une même classe
 * En précisant une un paramètre à la méthode getInstance.
 */

require_once 'Routing/Router.php';

use Routing\Router;


// On appelle une instance du Router
$router = Router::getInstance('instance_1');

$router->add('page1', 'page@get1');
$router->add('page2', 'page@get2');

// Retourne bien les 2 routes
var_dump($router->getRoutes());


// On appelle de nouveau l'instance du Router (retournera la même instance que le 1ère appelle d'instance du Router)
$router2 = Router::getInstance('instance_1');
$router2->add('page3', 'page@get3');

// Retourne bien les 3 routes
var_dump($router->getRoutes());

// Retourne bien les 3 routes
var_dump($router2->getRoutes());


// On appelle une nouvelle instance du Router (retournera une nouvelle instance)
$router3 = Router::getInstance('instance_2');
$router3->add('page3', 'page@get3');

// Retourne bien que les 3 routes de 'instance_1'. La route de 'instance_2' n'a donc pas été prise en compte
var_dump($router->getRoutes());

// Retourne bien qu'une seule router (la route de 'instance_2')
var_dump($router3->getRoutes());

