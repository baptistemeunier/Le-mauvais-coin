<?php include ROOT.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>
<div class="grille">
	<div class="collone collone-1">
	</div>
	<div class="collone collone-6">

		<?= /** @var Form $form */ $form->create("#") ?>
		<label for="categorie">Catégorie :</label>
		<?= $form->select('categorie', $categories) ?>
		<label for="categorie">Ville/Régions :</label>
		<?= $form->select('localisation', array('Région' => $regions, "Ville" => $villes)) ?>
		<label for="categorie">Prix :</label>

		Entre <?= $form->input('prix-mini', array('type' => 'number')) ?>
		et <?= $form->input('prix-max', array('type' => 'number')) ?>

		<?= $form->input('submit', array('type' => 'submit', 'value' => 'Rechercher')) ?>
		<?= $form->close() ?>
	</div>
</div>
<?php foreach($annonces as $k => $annonce): ?>
	<?php include ROOT.'/View/Annonce/blockannonce.php'; ?>
<?php endforeach; ?>


<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>
