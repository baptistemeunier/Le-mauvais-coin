<?php
/**
 * annonce.php
 * Page permetant d'afficher une annonce
 **/
session_start();

/* Chargement de autoloader et de la classe App */
require_once "Class/autoloader.php";
$App = new App();

$id = (isset($_GET['id']) && is_numeric($_GET['id']))?$_GET['id']:1;

/* Récuperation de l'annonce */
$annonce = $App->getDBInstance()->findAnnonce($id);

$App->getTemplate()->set("titre", $annonce->getTitre());
$App->getTemplate()->set("title", $annonce->getTitre().' - Le mauvais coin');
/* Affichage de la page */
echo $App->render("annonce", array('annonce' => $annonce));
?>