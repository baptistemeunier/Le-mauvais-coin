<?php

/**
 * Classe App
 *
 * Classe chargée dans toute les pages.
 * Elle contient des instances de toutes les classes nécessaires aux pages.
 **/
class App
{
	/** Instance de la classe Template
	 * @var Template $template
	 **/
	private $template;

	/** Instance la classe Database
	 * @var Database $database
	 **/
	private $database;

	function __construct()
	{
		/* Appel les classes nécessaire aux pages */
		$this->template = new Template("View/");
		$this->database = new Database('localhost', 'projet', 'root', '');
	}

	/**
	 * Fonction getTemplate
	 * Permet de recupérer l'instance de Template
	 * @return Template
	 */
	public function getTemplate()
	{
		return $this->template;
	}

	/**
	 * Fonction getDBInstance
	 * Permet de recupérer l'instance de Database
	 * @return Database
	 */
	public function getDBInstance()
	{
		return $this->database;
	}
}
?>