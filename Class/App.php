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


	/** Variable de configuration
	 * @var Array $config
	 **/
	private $config;

	/** Instance de la classe Session
	 * @var Session $session
	 **/
	private $session;

	function __construct()
	{
		/* Appel les classes nécessaire aux pages */
		$this->config = include("config.php");
		$this->template = new Template($this->config['dir_view']);
		$this->session = new Session();
		$this->database = new Database($this->config['db_host'], $this->config['db_name'], $this->config['db_login'], $this->config['db_pass']);
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