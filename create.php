<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 */

/* Chargement de autoloader et des classe nessesaire */
require_once "Class/autoloader.php";

$template = new Template();
$query = new Query('localhost', 'projet', 'root', '');


echo $template->render("View/createannonce.php");

