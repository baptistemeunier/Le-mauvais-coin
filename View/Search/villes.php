<?php include ROOT.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>

<ul id="search">
	<?php foreach($villes as $k => $ville): ?>
	<li><a href="<?= ROOT_RELATIVE ?>/search/villes/<?= $ville->getId() ?>"><?= $ville->getVille() ?></a></li>
	<?php endforeach; ?>
</ul>

<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

