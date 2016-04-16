<?php
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

session_start(); // Demarrage de la session

/* Definition de quelque constante */
define('PUBLIC', dirname(__FILE__)); // Repertoire public (Soit le repertoire avec le CSS, les image, Etc ...)
define('ROOT_RELATIVE', dirname(dirname($_SERVER['SCRIPT_NAME']))); // Racine relative (pour les lien par exemple)
define('ROOT', dirname(dirname(__FILE__))); // Repertoire racine (pour avoir accées au dossier depuis la racine)
/* Chargement de autoloader (Qui cherche puis charge les classe) */
require_once ROOT ."/Core/autoloader.php";

$Dispatcher = new Dispatcher();
?>