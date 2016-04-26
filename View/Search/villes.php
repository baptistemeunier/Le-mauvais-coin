<?php $titre = "Recherche par villes";
include ROOT.'/View/header.php'; // Appel du template contenant les balises <head>, <header>
include ROOT.'/View/Search/searchbar.php'; ?>

<ul id="search">
	<?php foreach($villes as $k => $ville): ?>
	<li><a href="<?= $this->getUrl('view_ville', ['id' => $ville->getId()]) ?>"><?= $ville->getVille() ?></a></li>
	<?php endforeach; ?>
</ul>

<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

