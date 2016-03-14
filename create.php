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
	if(strlen($_POST['titre']) < 10){
		$App->getSession()->setMessage("Le titre de votre annonce doit faire au moins 10 caractères");
	}else if(strlen($_POST['description']) < 15){
		$App->getSession()->setMessage("La description de votre annonce doit faire au moins 15 caractères");
	}else{
		$App->getDBInstance()->AddAnnonce($_POST, $App->getSession()->getUser()->getId()); // On ajoute l'annonce
	}
}

$categories = $App->getDBInstance()->findAllCategories();
$cat_divers = new Caterorie();
$cat_divers->setId(NULL)
	->setCategorie('Divers');
$categories[] = $cat_divers;
$villes     = $App->getDBInstance()->findAllVilles();

echo $App->render("createannonce", array('form' => new Form($_POST), 'categories' => $categories, 'villes' => $villes));

