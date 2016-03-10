<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 **/

/* Chargement de autoloader et de la classe App */
require_once "Class/autoloader.php";
$App = new App();
include('Class/con');
/* Récuperation des annonces */
$annonces = $App->getDBInstance()->findAllAnnonces();

/* Affichage de la page */
echo $App->getTemplate()->render("listannonces", array('annonces' => $annonces));
?>