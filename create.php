<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 */

/* Chargement de autoloader et des classe nessesaire */
require_once "Class/autoloader.php";
$App = new App();


echo $App->getTemplate()->render("createannonce");

