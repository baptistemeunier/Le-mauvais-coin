<?php
session_start();
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 **/

/* Chargement de autoloader et de la classe App */
require_once "Class/autoloader.php";
$App = new App();

/* Récuperation des annonces */
$annonces = $App->getDBInstance()->findAllAnnonces();

/* Affichage de la page */

echo $App->render("listannonces", array('annonces' => $annonces));
?>