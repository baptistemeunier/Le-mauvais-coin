<?php include __ROOT__.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>

<ul>
	<?php foreach($villes as $k => $ville): ?>
	<li><a href="?page=search/villes&ville=<?= $ville->getId() ?>"><?= $ville->getVille() ?></a></li>
	<?php endforeach; ?>
</ul>

<?php include __ROOT__.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

