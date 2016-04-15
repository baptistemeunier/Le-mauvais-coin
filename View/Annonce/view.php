<?php include ROOT.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>
<div class="grille">
	<div class="collone collone-6">
		<h4>Description de l'annonce : </h4>
		<?= $annonce->getDescription() ?>
	</div>
	<div class="collone collone-4">
		<div class="info-line">
			<p class="inline">Information sur l'annonce</p>
		</div>
		<div class="info-line">
			<p class="name">Categorie</p>
			<p class="value"><?= $annonce->getCategorieFormat() ?></p>
		</div>
		<div class="info-line">
			<p class="name">Prix</p>
			<p class="value"><?= ($annonce->getPrixFormat() != "")?$annonce->getPrixFormat():"Non spécifié" ?></p>
		</div>
		<div class="info-line">
			<p class="name">Ville</p>
			<p class="value"><?= $annonce->getVille() ?> <?= $annonce->getCp() ?></p>
		</div>
		<div class="info-line">
			<p class="name">Région</p>
			<p class="value"><?= $annonce->getRegion() ?></p>
		</div>
		<div class="info-line">
			<p class="inline">Information sur le vendeur</p>
		</div>
		<div class="info-line">
			<p class="name">Mail</p>
			<p class="value"><?= $annonce->getEmail() ?></p>
		</div>
		<div class="info-line">
			<p class="name">Téléphone</p>
			<p class="value"><?= $annonce->getTel() ?></p>
		</div>
		<?php if($session->is_connect() && ($session->is_admin() || $session->getUser()->getEmail() == $annonce->getEmail())): ?>
			<div class="info-line">
				<p class="inline">Fonction de gestion</p>
			</div>
			<div class="info-line">
				<p class="inline-btn"><a href="<?= ROOT_RELATIVE ?>/annonce/delete/<?= $annonce->getId() ?>" class="btn">Supprimer l'annonce</a></p>
			</div>

		<?php endif; ?>
	</div>
</div>
<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

