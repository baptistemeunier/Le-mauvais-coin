<?php
/**
 * Function __autoload
 * Permet de charger une classe de manière dynamique
 * @param string $classe Nom de la classe a charger
 */
function __autoload($classe)
{
	/* Principe de fonctionnement
	 * On cherche dans les dossiers la classe
	 * Et si on la trouve on l'inclue
	 */
	if (file_exists("Class/" . $classe . ".php")){
		include "Class/" . $classe . ".php";
	}else if(file_exists("Class/Table/" . $classe . ".php")){
		include "Class/Table/" . $classe . ".php";
	}
}
