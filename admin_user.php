<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 **/
session_start();

/* Chargement de autoloader et de la classe App */
require_once "Class/autoloader.php";
$App = new App();

if(!$App->getSession()->is_Admin()){
	$App->getSession()->setMessage("Veuillez vous connecté pour accedée à cette page", 'attention'); // on affiche l'erreur
	header('Location: connect.php'); // On le redirige vers la connection
	exit();
}

$users = $App->getDBInstance()->findUsers();

/* Affichage de la page */
echo $App->render("admin_user", array('users' => $users));
?>