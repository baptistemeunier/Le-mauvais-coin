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
		<link rel="stylesheet" type="text/css" href="<?= ROOT_RELATIVE ?>/css/app.css">
		<link rel="stylesheet" type="text/css" href="<?= ROOT_RELATIVE ?>/css/form.css">
	</head>
	<body>
		<div id="page">
			<header>
				<div class="container">
					<nav class="nav-header">
						<a href="<?= $this->getUrl('index') ?>">Accueil</a>
						<a href="<?= $this->getUrl('recherche') ?>">Recherche</a>
						<a href="<?= $this->getUrl('statistiques') ?>">Statistiques</a>
						<div style="float:right">
							<?php if($session->is_connect()): ?>
								<a href="<?= $this->getUrl('create_annonce') ?>">Ajoutez votre annonce !</a>
								<?php if($session->is_Admin()): ?>
									<a href="<?= $this->getUrl('list_users') ?>">Gestion membres</a>
								<?php endif; ?>
								<a href="<?= $this->getUrl('login') ?>">Déconnexion</a>
							<?php else: ?>
								<a href="<?= $this->getUrl('inscription') ?>">Inscription</a>
								<a href="<?= $this->getUrl('login') ?>">Connexion</a>
							<?php endif; ?>
						</div>
					</nav>
				</div>
			</header>

			<div class="container">
				<h1 class="title"><?= (isset($titre))?$titre:'Bienvenue sur le Mauvais Coin'?></h1>

			<?php foreach($session->getMessages() as $type => $message): ?>
				<div class="message-global <?= $type ?>">
					<?= $message ?>
				</div>
			<?php endforeach; ?>
