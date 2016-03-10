<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 */

/* Chargement de autoloader et des classe nessesaire */
require_once "Class/autoloader.php";
$ville = (isset($_GET['ville']) && is_numeric($_GET['ville']))?$_GET['ville']:null;
$App = new App();

if($ville){
	$annonces = $App->getDBInstance()->findAnnoncesBy(array('a.ville_id' => $ville));
	echo $App->getTemplate()->render("listannonces", array('titre' => "Recherche par ville", 'annonces' => $annonces));
}else{
	$villes = $App->getDBInstance()->findAllVilles();
	echo $App->getTemplate()->render("listvilles", array('titre' => "Liste des villes disponible", 'villes' => $villes));
}
