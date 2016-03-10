<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 */
session_start();

/* Chargement de autoloader et des classe nessesaire */
require_once "Class/autoloader.php";
$App = new App();
/* Si l'utilisateur n'est pas connecté */
if(!$App->getSession()->is_connect()){
	$App->getSession()->setMessage("Veuillez vous connecté pour accedée à cette page", 'attention'); // on affiche l'erreur
	header('Location: connect.php'); // On le redirige vers la connection
	exit();
}

/* Si le formulaire est remplie */
if(!empty($_POST)){
	$App->getDBInstance()->AddAnnonce($_POST, $App->getSession()->getUser()->getId()); // On ajoute l'annonce
}

$categories = $App->getDBInstance()->findAllCategories();
$villes     = $App->getDBInstance()->findAllVilles();

echo $App->render("createannonce", array('form' => new Form($_POST), 'categories' => $categories, 'villes' => $villes));

