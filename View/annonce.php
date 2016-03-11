<?php include 'header.php'; // Appel du template contenant les balises <head>, <header> ?>
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
			<p class="value"><?= $annonce->getVille() ?> XXXXX</p>
		</div>
		<div class="info-line">
			<p class="name">Région</p>
			<p class="value">XXXXXXXXX</p>
		</div>
		<div class="info-line">
			<p class="inline">Information sur le vendeur</p>
		</div>
		<div class="info-line">
			<p class="name">Mail</p>
			<p class="value">XXXXXXXXX@XXX.com</p>
		</div>
		<div class="info-line">
			<p class="name">Téléphone</p>
			<p class="value">0000000000</p>
		</div>
		<?php if($session->is_admin()): ?>
			<div class="info-line">
				<p class="inline">Fonction de gestion</p>
			</div>
			<div class="info-line">
				<p class="inline-btn"><a href="#" class="btn" style="background-color: #0783f9;">Modifier l'annonce</a></p>
			</div>
			<div class="info-line">
				<p class="inline-btn"><a href="#" class="btn">Supprimer l'annonce</a></p>
			</div>

		<?php endif; ?>
	</div>
</div>
<?php include 'footer.php'; // Appel du template contenant les balises <footer> ?>

