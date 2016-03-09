<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 */

/* Chargement de autoloader et des classe nessesaire */
require_once "Class/autoloader.php";
$template = new Template();
$query = new Query('localhost', 'projet', 'root', '');
if($ville){
	$annonces = $query->findAnnoncesByVille($ville);
	echo $template->render("View/listannonces.php", array('titre' => "Recherche par ville", 'annonces' => $annonces));
}else{
	$villes = $query->findAllVilles();
	echo $template->render("View/listvilles.php", array('titre' => "Liste des villes disponible", 'villes' => $villes));
}
