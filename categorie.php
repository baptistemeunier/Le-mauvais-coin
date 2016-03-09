<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 */

/* Chargement de autoloader et des classe nessesaire */
require_once "Class/autoloader.php";
$categorie = (isset($_GET['cat']) && is_numeric($_GET['cat']))?$_GET['cat']:null;
$App = new App();

/* Récuperation des annonces */
if($categorie){
	$annonces = $App->getDBInstance()->findAnnoncesBy(array('a.categorie_id' => $categorie));
	echo $App->getTemplate()->render("listannonces", array('titre' => "Recherche par categorie", 'annonces' => $annonces));
}else{
	$categories = $App->getDBInstance()->findAllCategories();
	echo $App->getTemplate()->render("listcategories", array('titre' => "Liste des categories disponible", 'categories' => $categories));
}


