<?php include __ROOT__.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>

<div id="content" style="text-align: center">
	<?= $form->create("#"); ?>
	<label for="titre">Adresse email : </label>
	<?= $form->input('email'); ?>
	<label for="prix">Mot de passe : </label>
	<?= $form->input('mdp', array("type" => "password")); ?><br />

	<?= $form->input('submit', array("type" => "submit", "value" => "Publier votre annonce !")); ?>
	<?= $form->close(); ?>
</div>
<?php include __ROOT__.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

