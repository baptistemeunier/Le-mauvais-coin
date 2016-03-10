<?php include 'header.php'; // Appel du template contenant les balises <head>, <header> ?>

<?php foreach($annonces as $k => $annonce): ?>
	<?php include 'blockannonce.php'; ?>
<?php endforeach; ?>

<?php include 'footer.php'; // Appel du template contenant les balises <footer> ?>

