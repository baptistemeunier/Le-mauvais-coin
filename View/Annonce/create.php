<?php
/** @var Form $form */
 include __ROOT__.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>

<div class="grille">
	<div class="collone collone-1"></div>
	<div class="collone collone-6">
		<?= $form->create("#"); ?>
		<label for="titre">Titre de l'annonce : </label>
		<?= $form->input('titre', array('class' => 'inline')); ?><br />

		<label for="description">Description de l'annonce : </label>
		<?= $form->textarea('description'); ?><br />

		<label for="categorie">Catégorie de l'annonce : </label>
		<?= $form->select('categorie', $categories); ?>
		<?= $form->input('categorie_autre'); ?><br />

		<label for="ville">Choisiser votre ville : </label>
		<?= $form->select('ville', $villes); ?>  <?= $form->input('ville_autre'); ?><br />

		<label for="prix">Definiser votre prix (Peut être nul) : </label>
		<?= $form->input('prix', array("type" => "number")); ?><br />

		<?= $form->input('submit', array("type" => "submit", "value" => "Publier votre annonce !")); ?>
		<?= $form->close(); ?>
	</div>
</div>
<?php include __ROOT__.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

