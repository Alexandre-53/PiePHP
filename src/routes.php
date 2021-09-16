<?php
use \Core\Router;
// On appel la methode statique connect de router
// ce qui a pour but de déclancher notre autoloader
//  qui va inclure le fichier de la classe pour la rendre
// accessible
// ROUTE GLOBAL
Router::global(['controller' => 'AppController', 'action' => 'global']);

// ROUTE APP
Router::get('/', ['controller' => 'AppController', 'action' => 'index']);

// ROUTE USER
Router::get('/register', ['controller' => 'UserController', 'action' => 'register']);
Router::post('/register', ['controller' => 'UserController', 'action' => 'registerPost']);
Router::get('/login', ['controller' => 'UserController', 'action' => 'login']);
Router::post('/login', ['controller' => 'UserController', 'action' => 'loginPost']);
Router::get('/logout', ['controller' => 'UserController', 'action' => 'logout']);
Router::get('/profil', ['controller' => 'UserController', 'action' => 'profil']);
Router::post('/profil', ['controller' => 'UserController', 'action' => 'edit']);
Router::post('/profil/delete', ['controller' => 'UserController', 'action' => 'delete']);

//ROUTE RECHERCHE MEMBRES 
Router::get('/membre', ['controller' => 'MembreController', 'action' => 'membre']);
Router::post('/membre', ['controller' => 'MembreController', 'action' => 'seekmembre']);

//ROUTE RECHERCHE FILMS 
Router::get('/film', ['controller' => 'FilmController', 'action' => 'film']);
Router::post('/film', ['controller' => 'FilmController', 'action' => 'seekfilm']);


// ROUTE CINEMA
// Router::connect('/films', ['controller' => 'UserController', 'action' => 'seekfilms']);
?>

