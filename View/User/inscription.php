<?php
/**
 * @var Form $form
 */
include ROOT.'/View/header.php'; // Appel du template contenant les balises <head>, <header>
?>

	<p class="inscription-info">Afin de pouvoir poster des annonces sur Le Mauvais Coin vous dévez remplir ce formulaire d'inscription</p>

	<?= $form->create(); ?>
	<label for="email"> Votre email : </label>
	<?= $form->input('email', array('type' => 'email', 'placeholder' => 'email@domaine.com', 'class' => 'halfline')); ?><br />
	<label for="tel"> Votre numero de téléphone (facultatif) : </label>
	<?= $form->input('tel', array('type' => 'tel', 'placeholder' => '0612345678', 'class' => 'halfline')); ?><br />

	<label for="mdp"> Entrez un mot de passe : </label>
	<?= $form->input('mdp', array('type' => 'password', 'class' => 'halfline')); ?><br />
	<label for="confirm"> Merci de le confirmer : </label>
	<?= $form->input('confirm', array('type' => 'password', 'class' => 'halfline')); ?><br />

	<?= $form->input('submit', array('type' => 'submit', 'value' => 'Valider votre inscription', 'class' => 'btn btn-register')); ?>
	<?= $form->close(); ?>
<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

