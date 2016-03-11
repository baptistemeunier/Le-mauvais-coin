<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 **/
session_start();

/* Chargement de autoloader et de la classe App */
require_once "Class/autoloader.php";
$App = new App();

/* Affichage de la page */
echo $App->render("inscription", array('form' => new Form()));
?>