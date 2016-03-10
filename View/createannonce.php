<?php include 'header.php'; // Appel du template contenant les balises <head>, <header> ?>

<div class="grille">
	<div class="collone collone-1"></div>
	<div class="collone collone">
		<?= $form->create("#"); ?>
		<label for="titre">Titre de l'annonce : </label>
		<?= $form->input('titre', array('class' => 'inline')); ?><br />
		<label for="titre">Description de l'annonce : </label>
		<?= $form->textarea('description'); ?><br />
		<label for="titre">Vos coordonées : </label>
		<?= $form->input('email'); ?> <?= $form->input('tel'); ?><br />
		<label for="titre">Catégorie de l'annonce : </label>
		<?= $form->select('categorie', $categories); ?> <?= $form->input('categorie_autre'); ?><br />
		<label for="titre">Choisiser votre ville : </label>
		<?= $form->select('ville', $villes); ?>  <?= $form->input('ville_autre'); ?><br />
		<label for="titre">Definiser votre prix (Peut être nul) : </label>
		<?= $form->input('prix', array("type" => "number")); ?><br />
		<?= $form->input('submit', array("type" => "submit", "value" => "Publier votre annonce !")); ?>
		<?= $form->close(); ?>
	</div>
</div>
<?php include 'footer.php'; // Appel du template contenant les balises <footer> ?>

