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

	/**
	 * Fonction getTemplate
	 * Permet de recupérer l'instance de Template
	 * @return Template
	 */
	public function getSession()
	{
		return $this->session;
	}

	public function render($file, $data = array())
	{
		$this->template->set('session', $this->session);
		return $this->template->render($file, $data);
	}

	/**
	 * @param String $email L'email du compte
	 * @param String $mdp Le mot de passe du compte
	 * @return Bool true si il connecté false sinon
	 */
	public function connectUser($email, $mdp)
	{
		$user = $this->database->findUser($email);
		if($user === false){
			$this->session->setMessage("<b>Connexion imposible !</b> Cette email ne corespond à aucun compte");
		}else{
			if($user->getMdp()==hash('sha256', $mdp)){
				$this->session->setMessage("<b>Connexion reussi !</b> Vous étes maintenant connecté");
				$this->session->set("_user", serialize($user));
				return true;
			}
			$this->session->setMessage("<b>Connexion imposible !</b> Mot de passe incorect");
		}
		return false;
	}
}
?>