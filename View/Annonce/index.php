<?php include ROOT.'/View/header.php';  // Appel du template contenant les balises <head>, <header> ?>

<?php foreach($annonces as $k => $annonce): ?>
	<?php include ROOT.'/View/Annonce/blockannonce.php'; ?>
<?php endforeach; ?>

<?php include ROOT.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

