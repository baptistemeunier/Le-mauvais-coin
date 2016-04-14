<?php include __ROOT__.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>

<ul id="search">
	<?php foreach($categories as $k => $categorie): ?>
	<li><a href="?page=search/categories&cat=<?= $categorie->getId() ?>"><?= $categorie->getCategorie() ?></a></li>
	<?php endforeach; ?>
</ul>

<?php include __ROOT__.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

