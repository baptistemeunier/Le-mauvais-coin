<?php include  __ROOT__.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>

<ul>
	<?php foreach($users as $k => $user): ?>
	<li><?= $user->getEmail() ?> <?= $user->getTel() ?></li>
	<?php endforeach; ?>
</ul>

<?php include  __ROOT__.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

