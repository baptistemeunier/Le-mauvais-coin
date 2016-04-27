<?php $titre = "Recherche par catégorie";
include ROOT.'/View/header.php'; // Appel du template contenant les balises <head>, <header>
include ROOT.'/View/Search/searchbar.php'; ?>

<ul id="search">
	<?php foreach($categories as $k => $categorie): ?>
	<li><a href="<?= $this->getUrl('view_categorie', ['id' => $categorie->getId()]) ?>"><?= $categorie->getCategorie() ?></a></li>
	<?php endforeach; ?>
</ul>

<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

