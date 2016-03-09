<?php include 'header.php'; // Appel du template contenant les balises <head>, <header> ?>

<ul>
	<?php foreach($categories as $k => $categorie): ?>
	<li><a href="categorie.php?cat=<?= $categorie->id ?>"><?= $categorie->categorie ?></a></li>
	<?php endforeach; ?>
</ul>

<?php include 'footer.php'; // Appel du template contenant les balises <footer> ?>

