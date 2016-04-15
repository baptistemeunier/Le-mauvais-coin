<?php include ROOT.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>
<div class="grille">
	<div class="collone collone-6">
			Depuis sa création le site enregistre <strong><?= $annonces ?> annonces.</strong><br />
			A ce jour il y a <strong><?= $users ?> actifs enregistrés.</strong><br />
			La categorie la plus utilisée est la catégorie <strong><?= $categorie['nom'] ?></strong> avec <?= $categorie['count'] ?> annonces.<br />
			La ville la plus active est la ville de <strong><?= $ville['nom'] ?></strong> avec <?= $ville['count'] ?> annonces.
	</div>
</div>
<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>
