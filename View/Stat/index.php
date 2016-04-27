<?php include ROOT.'/View/header.php'; // Appel du template contenant les balises <head>, <header> ?>
	Depuis sa création le site enregistre <strong><?= $annonces ?> annonces.</strong><br />
	A ce jour il y a <strong><?= $users ?> actifs enregistrés.</strong><br />
<?php
	Graph::graphColonne($categories, "Graphique du nombres d'annnonce par categories");
	Graph::graphColonne($ville, "Graphique du nombres d'annnonce par ville");
?>
<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>
