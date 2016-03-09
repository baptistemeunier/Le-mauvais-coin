<?php
/**
 * header.php
 * Fichier contenant les balises <head> <header> <h1>
 */
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= (isset($title))?$title:'Le Mauvais Coin - Site de petite annonces'?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/base.css">
</head>
<body>
<div id="page">
	<header>
		<div>
		</div>
		<nav>
			<ul>
				<li><a href="index.php">Accueil</a></li>
				<li><a href="#">Recherche</a>
					<ul>
						<li><a href="categorie.php">Par catégorie</a></li>
						<li><a href="ville.php">Par ville</a></li>
						<li><a href="recherche.php">Recherche avancée</a></li>
					</ul>
				</li>
				<li style="float:right"><a href="#">Ajoutez votre annonce !</a></li>

			</ul>
		</nav>
	</header>

	<h1><?= (isset($titre))?$titre:'Bienvenue sur le Mauvais Coin'?></h1>
