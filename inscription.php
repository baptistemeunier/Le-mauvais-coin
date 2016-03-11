<?php
/**
 * index.php
 * Fichier gérant l'affichage de la page d'accueil
 **/
session_start();

/* Chargement de autoloader et de la classe App */
require_once "Class/autoloader.php";
$App = new App();

if($App->getSession()->is_connect()){
	die("Bye !!!");
}

if(!empty($_POST)){
	dump($_POST);
	if($_POST['email'] == "" || preg_match("%^[a-zA-Z0-9.]+@[a-zA-Z]+.[a-z.]+$%", $_POST['email']) == 0){
		$App->getSession()->setMessage("L'email saisie est incorecte");
	}else if($_POST['tel'] != "" && (!is_numeric($_POST['tel']) || strlen($_POST['tel']) != 10)){
		$App->getSession()->setMessage("Le numero de téléphone est incorect");
	}else if($_POST['mdp'] != $_POST['confirm'] || $_POST['mdp'] == ""){
		$App->getSession()->setMessage("Les mots de passe ne coresponde pas");
	}
	$App->getDBInstance()->AddUser($_POST);
}

/* Affichage de la page */
echo $App->render("inscription", array('form' => new Form($_POST)));
?>