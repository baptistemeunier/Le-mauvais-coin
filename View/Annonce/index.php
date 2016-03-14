<?php include __ROOT__.'/View/header.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'].'View/header.php'; // Appel du template contenant les balises <head>, <header> ?>

<?php foreach($annonces as $k => $annonce): ?>
	<?php include __ROOT__.'/View/Annonce/blockannonce.php'; ?>
<?php endforeach; ?>

<?php include __ROOT__.'/View/footer.php'; // Appel du template contenant les balises <footer> ?>

