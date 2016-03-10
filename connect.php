<?php
session_start();
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 **/

/* Chargement de autoloader et de la classe App */
require_once "Class/autoloader.php";
$App = new App();

/* Titre de la page */
$App->getTemplate()->set("titre", 'Espace membres : Connexion');

/* Si le formulaire est remplie */
if(!empty($_POST)){
	/* On tente de connecté l'utilisateur */
	if($App->connectUser($_POST['email'], $_POST['mdp'])){
		header('Location: index.php'); // Si connecté on le redirige
	}
}

/* Affichage de la page */
echo $App->render("connect", array('form' => new Form($_POST)));
?>