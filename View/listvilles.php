<?php include 'header.php'; // Appel du template contenant les balises <head>, <header> ?>

<ul>
	<?php foreach($villes as $k => $ville): ?>
	<li><a href="ville.php?ville=<?= $ville->getId() ?>"><?= $ville->getVille() ?></a></li>
	<?php endforeach; ?>
</ul>

<?php include 'footer.php'; // Appel du template contenant les balises <footer> ?>

