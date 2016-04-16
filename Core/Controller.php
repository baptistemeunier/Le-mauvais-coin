<?php

/**
 * Classe Controller
 *
 * Classe chargée dans toute les pages.
 * Elle contient des instances de toutes les classes nécessaires aux pages.
 **/
class Controller
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

	public $request;

	function __construct($request)
	{
		/* Appel les classes nécessaire aux pages */
		$this->config = include("config.php");
		$this->template = new Template($this->config['dir_view']);
		$this->session = new Session();
		$this->database = new Database($this->config['db_host'], $this->config['db_name'], $this->config['db_login'], $this->config['db_pass']);
		$this->request = $request;
	}

	/**
	 * @return Array
	 */
	public function getParams($key = null)
	{
		die("Fontion getParams Changée !! die()");
	}

	/**
	 * Fonction getTemplate
	 * Permet de recupérer l'instance de Template
	 * @return Template
	 */
	protected function getTemplate()
	{
		return $this->template;
	}

	/**
	 * Fonction getDBInstance
	 * Permet de recupérer l'instance de Database
	 * @return Annonces|Categories|Regions|Users|Villes|Stat
	 */
	protected function getDBInstance($model)
	{

		return new $model($this->database->getDB());
	}

	/**
	 * Fonction getTemplate
	 * Permet de recupérer l'instance de Template
	 * @return Session
	 */
	protected function getSession()
	{
		return $this->session;
	}

	protected function render($file, $data = array())
	{
		$this->template->set('session', $this->session);
		return $this->template->render($file, $data);
	}

	/**
	 * @param String $email L'email du compte
	 * @param String $mdp Le mot de passe du compte
	 * @return Bool true si il connecté false sinon
	 */
	protected function connectUser($email, $mdp)
	{
		$user = $this->database->findUser($email);
		if($user === false){
			$this->session->setMessage("<b>Connexion imposible !</b> Cette email ne corespond à aucun compte");
		}else{
			if($user->getMdp()==hash('sha256', $mdp)){
				$this->session->setMessage("<b>Connexion reussi !</b> Vous étes maintenant connecté", 'valid');
				$this->session->set("_user", serialize($user));
				return true;
			}
			$this->session->setMessage("<b>Connexion imposible !</b> Mot de passe incorect");
		}
		return false;
	}

	protected function disconnectUser()
	{
		$this->session->setMessage("Vous étes maintenant déconnecté", 'valid');
		unset($_SESSION['_user']);
	}

	public function createNotFound($message, $debug = false){
		$config = false;

		header('HTTP/1.1 404 Not Found');

		$message = ($debug && !$config)?'Inconnue':$message;
		return $this->render("Error/404", array('message' => $message));
	}

	public function createInternalError($message, $debug = false){
		$config = false;

		header('HTTP/1.1 500 Internal Server Error');
		$message = ($debug && !$config)?'Le serveur ne peut afficher la page demandée':$message;
		return $this->render("Error/404", array('message' => $message));
	}

}
?>
