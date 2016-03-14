<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 */
session_start();

/* Chargement de autoloader et des classe nessesaire */
require_once "Class/autoloader.php";
$App = new App();

$categories = $App->getDBInstance()->findAllCategories();
$villes     = $App->getDBInstance()->findAllVilles();
$regions    = $App->getDBInstance()->findAllRegions();
$annonces   = array();

if(!empty($_POST)){
	$champs = array();
	if($_POST['categorie'] != 'none'){
		$champs['a.categorie_id'] = $_POST['categorie'];
	}
	if($_POST['localisation'] != 'none'){
		$temp = explode('-', $_POST['localisation']);
		if($temp[0] == 'region'){
			$champs['v.region_id'] = $temp[1];
		}else{
			$champs['v.id'] = $temp[1];
		}
	}
	if($_POST['prix-mini'] != '' && $_POST['prix-max'] != '' && $_POST['prix-max'] >= $_POST['prix-mini']){
		$champs['a.prix >'] = $_POST['prix-mini'];
		$champs['a.prix <'] = $_POST['prix-max'];
	}
	$annonces = $App->getDBInstance()->findAnnoncesBy($champs);
}

echo $App->render("recherche", array('form' => new Form($_POST),'categories' => $categories, 'villes' => $villes, 'regions' => $regions, 'annonces' => $annonces));