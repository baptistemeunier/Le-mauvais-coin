<?php
session_start(); // Demarrage de la session

/* Definition de quelque constante */
define('PUBLIC', dirname(__FILE__)); // Repertoire public (Soit le repertoire avec le CSS, les image, Etc ...)
define('ROOT_RELATIVE', dirname(dirname($_SERVER['SCRIPT_NAME']))); // Racine relative (pour les lien par exemple)
define('ROOT', dirname(dirname(__FILE__))); // Repertoire racine (pour avoir accées au dossier depuis la racine)
/* Chargement de autoloader (Qui cherche puis charge les classe) */
require_once ROOT ."/Core/autoloader.php";

$Dispatcher = new Dispatcher();
?>






<!--
/**
 * index.php
 * Fichier qui dirige l'utilisateur vers une page
 **/
session_start(); // Demarrage de la session

define('__ROOT__', dirname(__FILE__));
/* Chargement de autoloader */
require_once "Class/autoloader.php";

/* Récupére les données de URL */
dump(parse_url());
$get = $_GET;

if(!$get['page']){ // Si l'URL n'a pas de ?page=..
	/* Alors on demande d'afficher la page par defaut */
	$route_controller = 'AnnonceController';
	$route_action = 'indexAction';
}else{
	/* Sinon on recurére les données de l'URL (Le controlleur et l'action demandée) */
	$page = explode('/', $get['page']);
	$route_controller = ucfirst(strtolower($page[0])).'Controller';
	$route_action = ($page[1] !== null)?strtolower($page[1]).'Action':'indexAction';
}

if(class_exists($route_controller)){
	$Controller = new $route_controller($get); // On charge le Controller
	if(method_exists($Controller, $route_action)){
		echo $Controller->$route_action(); // On affiche la methode (Qui dois retrouner le contenu HTML à affiché)
	}else{
		header("HTTP/1.0 404 Not Found");
		echo "404 Not Found !";
	}
}else{
	header("HTTP/1.0 404 Not Found");
	echo "404 Not Found !";
}
