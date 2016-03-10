<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 */
session_start();

/* Chargement de autoloader et des classe nessesaire */
require_once "Class/autoloader.php";
$App = new App();
if(!empty($_POST)){
	$App->getDBInstance()->AddAnnonce($_POST);
}
$categories = $App->getDBInstance()->findAllCategories();
$villes     = $App->getDBInstance()->findAllVilles();

echo $App->render("createannonce", array('form' => new Form($_POST), 'categories' => $categories, 'villes' => $villes));

