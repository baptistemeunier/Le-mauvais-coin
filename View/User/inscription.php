<?php
/**
 * @var Form $formN
 */
include __ROOT__.'/View/header.php'; // Appel du template contenant les balises <head>, <header>
?>


<div class="grille">
	<div class="collone collone-1"></div>
	<div class="collone collone-6">
		<?= $form->create(); ?>
		<label for="email"> Votre email : </label>
		<?= $form->input('email', array('type' => 'email', 'placeholder' => 'email@domaine.com')); ?><br />
		<label for="tel"> Votre numero de téléphone (facultatif) : </label>
		<?= $form->input('tel', array('type' => 'tel', 'placeholder' => '0612345678')); ?><br />

		<label for="mdp"> Entrez un mot de passe : </label>
		<?= $form->input('mdp', array('type' => 'password')); ?><br />
		<label for="confirm"> Merci de le confirmer : </label>
		<?= $form->input('confirm', array('type' => 'password')); ?><br />

		<?= $form->input('submit', array('type' => 'submit', 'value' => 'M\'inscrire')); ?>
		<?= $form->close(); ?>
	</div>
</div>
<?php include __ROOT__.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

