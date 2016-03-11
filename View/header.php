<?php
/**
 * header.php
 * Fichier contenant les balises <head> <header> <h1>
 * @var Session $session
 **/
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?= (isset($title))?$title:'Le Mauvais Coin - Site de petite annonces'?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/base.css">
		<link rel="stylesheet" type="text/css" href="css/form.css">
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
						<li><a href="stat.php">Statistiques</a></li>
						<?php if($session->is_connect()): ?>
							<li style="float:right"><a href="connect.php">Déconnexion</a></li>
							<?php if($session->is_Admin()): ?>
								<li style="float:right"><a href="#">Panel Admin</a></li>
							<?php endif; ?>
							<li style="float:right"><a href="create.php">Ajoutez votre annonce !</a></li>
						<?php else: ?>
							<li style="float:right"><a href="connect.php">Connexion</a></li>
						<?php endif; ?>
					</ul>
				</nav>
			</header>

			<h1><?= (isset($titre))?$titre:'Bienvenue sur le Mauvais Coin'?></h1>

			<?php foreach($session->getMessages() as $type => $message): ?>
				<div class="message-global <?= $type ?>">
					<?= $message ?>
				</div>
			<?php endforeach; ?>
