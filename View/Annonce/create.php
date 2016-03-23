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
		<?= $form->select('categorie', $categories); ?><br />

		<label for="ville">Choisiser votre ville : </label>
		<?= $form->select('ville', $villes); ?>
		<?= $form->checkbox('create_ville', 'Autre ville', array('type' => 'checkbox')); ?><br />
		<label for="ville">Nom de la ville : </label>
		<?= $form->input('ville_nom', array('placeholder' => "Ex Les Herbiers")); ?>
		<label for="ville">CP de la ville : </label>
		<?= $form->input('ville_cp', array('placeholder' => "Ex 85500", "type" => "number")); ?>
		<label for="ville">Choisiser la region de la ville : </label>
		<?= $form->input('ville_region', array('placeholder' => "Ex Pays de la Loire")); ?><br />

		<label for="prix">Definiser votre prix (Peut être nul) : </label>
		<?= $form->input('prix', array("type" => "number")); ?><br />

		<?= $form->input('submit', array("type" => "submit", "value" => "Publier votre annonce !")); ?>
		<?= $form->close(); ?>
	</div>
</div>
<?php include __ROOT__.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

