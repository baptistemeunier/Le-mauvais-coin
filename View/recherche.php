<?php include 'header.php'; // Appel du template contenant les balises <head>, <header> ?>

<?= /** @var Form $form */ $form->create("#") ?>
<?= $form->select('categorie', $categories) ?>
<select name="localisation">
	<option value="none">Toute les régions</option>
	<optgroup label="Régions">
		<?php foreach($regions as $r): ?>
			<option value="region-<?= $r->id ?>"><?= $r->region ?></option>
		<?php endforeach; ?>
	</optgroup>
	<optgroup  label="Ville">
		<?php foreach($villes as $v): ?>
			<option value="ville-<?= $v->getId() ?>"><?= $v->getVille() ?></option>
		<?php endforeach; ?>
	</optgroup>
</select>
	Entre <input type="number" name="prix[mini]"> et <input type="number" name="prix[max]">
<?= $form->input('submit', array('type' => 'submit', 'value' => 'Rechercher')) ?>
<?= $form->close() ?>

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
				<?= $annonce->getVille() ?>
				<span class="prix"><?= $annonce->getPrixFormat() ?></span>
			</p>
			<footer>
				<p>
					<a href="categorie.php?cat=<?= $annonce->getCategorieId() ?>"> <?= $annonce->getCategorieFormat() ?> </a>
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
