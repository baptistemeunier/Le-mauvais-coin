<?php include ROOT.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>

<ul id="search">
	<?php foreach($categories as $k => $categorie): ?>
	<li><a href="<?= ROOT_RELATIVE ?>/search/categories/<?= $categorie->getId() ?>"><?= $categorie->getCategorie() ?></a></li>
	<?php endforeach; ?>
</ul>

<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

