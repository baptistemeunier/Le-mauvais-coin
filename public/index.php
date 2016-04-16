<?php
/* On active les erreurs du script PHP */
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 1);

/* Démarrage de la session */
session_start();

/* Definition de quelque constante */
define('PUBLIC', dirname(__FILE__));                                // Repertoire public (Soit le repertoire avec le CSS, les image, Etc ...)
define('ROOT_RELATIVE', dirname(dirname($_SERVER['SCRIPT_NAME']))); // Racine relative (Pour les liens par exemple)
define('ROOT', dirname(dirname(__FILE__)));                         // Repertoire racine (Pour avoir accées au dossier depuis la racine)

/* Chargement de autoloader (Qui cherche puis charge les classe) */
require_once ROOT ."/Core/autoloader.php";

/* Lancement du Dispatcher qui va prendre en charge la requete de l'utilisateur */
$Dispatcher = new Dispatcher();
?>