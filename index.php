<?php
/**
 * index.php
 * Fichier qui dirige l'utilisateur vers une page
 **/
session_start(); // Demarrage de la session

define('__ROOT__', dirname(__FILE__));
/* Chargement de autoloader */
require_once "Class/autoloader.php";

/* Récupére les données de URL */
$get = $_GET;

if(!$get['page']){ // Si l'URL n'a pas de ?page=..
	/* Alors on demande d'afficher la page par defaut */
	$route_controller = 'AnnonceController';
	$route_action = 'indexAction';
}else{
	/* Sinon on recurére les données de l'URL (Le controlleur et l'action demandée) */
	$page = explode('/', $get['page']);
	$route_controller = ucfirst(strtolower($page[0])).'Controller';
	$route_action = strtolower($page[1]).'Action';
}

$Controller = new $route_controller($get); // On charge le Controller
echo $Controller->$route_action(); // On affiche la methode (Qui dois retrouner le contenu HTML à affiché)
?>