<?php
/** @var Form $form */
$titre = "Poster une annonce";
include ROOT.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>

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

		<label for="ville">Saisisez votre ville : </label>
		<?= $form->input('ville_nom', array('placeholder' => "Nom de la ville Ex: Cholet")); ?>
		<?= $form->input('ville_cp', array('placeholder' => "Code postal Ex: 49300", "type" => "number")); ?>
		<?= $form->input('ville_region', array('placeholder' => "Region : Ex Pays de la Loire")); ?><br />

		<label for="prix">Definiser votre prix (Peut être nul) : </label>
		<?= $form->input('prix', array("type" => "number")); ?><br />

		<?= $form->input('submit', array("type" => "submit", "value" => "Publier votre annonce !")); ?>
		<?= $form->close(); ?>
	</div>
</div>
<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

