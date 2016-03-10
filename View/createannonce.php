<?php include 'header.php'; // Appel du template contenant les balises <head>, <header> ?>

<?= $form->create("#"); ?>
<?= $form->input('titre'); ?><br />
<?= $form->textarea('description'); ?><br />
<?= $form->input('email'); ?> <?= $form->input('tel'); ?><br />
<?= $form->select('categorie', $categories); ?> <?= $form->input('categorie_autre'); ?><br />
<?= $form->select('ville', $villes); ?>  <?= $form->input('ville_autre'); ?><br />
<?= $form->input('prix', array("type" => "number")); ?><br />
<?= $form->input('submit', array("type" => "submit", "value" => "Publier votre annonce !")); ?>
<?= $form->close(); ?>
<?php include 'footer.php'; // Appel du template contenant les balises <footer> ?>

