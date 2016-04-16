<?php
/**
 * Function __autoload
 * Permet de charger une classe de manière dynamique
 * @param string $classe Nom de la classe a charger
 */
function __autoload($classe)
{
	/* Principe de fonctionnement :
	 * On cherche dans les dossiers la classe
	 * Et si on la trouve on l'inclue
	 */
	if (file_exists(ROOT."/Core/" . $classe . ".php")){ // Classe du Noyau de l'application
		include ROOT."/Core/" . $classe . ".php";
	}else if (file_exists(ROOT."/Controller/" . $classe . ".php")){ // Classe Controller
		include ROOT."/Controller/" . $classe . ".php";
	}else if (file_exists(ROOT."/Model/" . $classe . ".php")){ // Classe Model
		include ROOT."/Model/" . $classe . ".php";
	}else if (file_exists(ROOT."/Table/" . $classe . ".php")){ // Classe Table
		include ROOT."/Table/" . $classe . ".php";
	}
}
