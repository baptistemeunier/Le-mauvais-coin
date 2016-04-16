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
		<link rel="stylesheet" type="text/css" href="<?= ROOT_RELATIVE ?>/css/base.css">
		<link rel="stylesheet" type="text/css" href="<?= ROOT_RELATIVE ?>/css/form.css">
	</head>
	<body>
		<div id="page">
			<header>
				<div>
				</div>
				<nav>
					<ul>
						<li><a href="<?= $this->getUrl('index') ?>">Accueil</a></li>
						<li><a href="#">Recherche</a>
							<ul>
								<li><a href="<?= $this->getUrl('liste_categories') ?>">Par catégorie</a></li>
								<li><a href="<?= $this->getUrl('list_villes') ?>">Par ville</a></li>
								<li><a href="<?= $this->getUrl('recherche_avance') ?>">Recherche avancée</a></li>
							</ul>
						</li>
						<li><a href="<?= $this->getUrl('statistiques') ?>">Statistiques</a></li>
						<?php if($session->is_connect()): ?>
							<li style="float:right"><a href="<?= $this->getUrl('login') ?>">Déconnexion</a></li>
							<?php if($session->is_Admin()): ?>
								<li style="float:right"><a href="#">Panel Admin</a>
									<ul>
										<li><a href="<?= $this->getUrl('list_users') ?>">Gestion membre</a></li>
									</ul>
								</li>

							<?php endif; ?>
							<li style="float:right"><a href="<?= $this->getUrl('create_annonce') ?>">Ajoutez votre annonce !</a></li>
						<?php else: ?>
							<li style="float:right"><a href="<?= $this->getUrl('login') ?>">Connexion</a></li>
							<li style="float:right"><a href="<?= $this->getUrl('inscription') ?>">Inscription</a></li>
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
