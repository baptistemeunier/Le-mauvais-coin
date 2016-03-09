<?php include 'header.php'; // Appel du template contenant les balises <head>, <header> ?>

<?php foreach($annonces as $k => $annonce): ?>
<?php if($k%2 == 0): ?>
<div class="grille">
	<div class="collone collone-1"></div>
<?php endif; ?>
	<div class="collone collone-4">
		<article>
			<header>
				<a href="#"><?= $annonce->getTitreFormat() ?></a>
			</header>
			<p class="info">
				<?= $annonce->ville ?>
				<span class="prix"><?= $annonce->getPrixFormat() ?></span>
			</p>
			<footer>
				<p>
					<a href="categorie.php?cat=<?= $annonce->categorie_id ?>"> <?= $annonce->getCategorieFormat() ?> </a>
					<span style="float: right;"><?= $annonce->getDateFormat() ?></span>
				</p>
			</footer>
		</article>
	</div>
	<div class="collone collone-1"></div>
<?php if($k%2 == 1): ?>
</div>
<?php endif; ?>

<?php endforeach; ?>

<?php include 'footer.php'; // Appel du template contenant les balises <footer> ?>

