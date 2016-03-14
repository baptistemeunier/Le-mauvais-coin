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
								<li><a href="index.php?page=search/categories">Par catégorie</a></li>
								<li><a href="index.php?page=search/villes">Par ville</a></li>
								<li><a href="index.php?page=search/avance">Recherche avancée</a></li>
							</ul>
						</li>
						<li><a href="#">Statistiques</a></li>
						<?php if($session->is_connect()): ?>
							<li style="float:right"><a href="index.php?page=user/connect">Déconnexion</a></li>
							<?php if($session->is_Admin()): ?>
								<li style="float:right"><a href="#">Panel Admin</a>
									<ul>
										<li><a href="#">Gestion annonce</a></li>
										<li><a href="index.php?page=user/admin">Gestion membre</a></li>
									</ul>
								</li>

							<?php endif; ?>
							<li style="float:right"><a href="index.php?page=annonce/create">Ajoutez votre annonce !</a></li>
						<?php else: ?>
							<li style="float:right"><a href="index.php?page=user/connect">Connexion</a></li>
							<li style="float:right"><a href="index.php?page=user/inscription">Inscription</a></li>
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
