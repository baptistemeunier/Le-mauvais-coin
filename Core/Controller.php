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

	/** Instance de la classe Session
	 * @var Session $session
	 **/
	private $session;

	/** Instance de la classe Request
	 * Contient les variables de la requete HTTP (ex GET et POST)
	 * @var Request $request
	 **/
	public $request;

	/** Constructeur de la classe Controller
	 * @param Request $request une instance de Request avec la requete HTTP
	 */
	function __construct($request)
	{
		$db = Config::$db; // Tableau de connection à la BDD

		/* Appel les classes nécessaire aux pages */
		$this->template = new Template(Config::$viewDir);
		$this->session = new Session();
		$this->database = new Database($db['db_host'], $db['db_name'], $db['db_login'], $db['db_pass']);
		$this->request = $request;
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
	 * Permet de recupérer l'instance d'un Model
	 * @param String $model Permet de charger un model
	 * @return Annonces|Categories|Regions|Stat|Users|Villes
	 */
	protected function getDBInstance($model)
	{
		return new $model($this->database->getDB());
	}

	/**
	 * Fonction getTemplate
	 * Permet de recupérer l'instance de la Session
	 * @return Session
	 */
	protected function getSession()
	{
		return $this->session;
	}

	/** Fonction qui permet de rendre la vue
	 * @param String $file La vue à rendre
	 * @param Array $data Variable suplementaire a enyoyer à la session
	 * @return String Le contenu à rendre
	 */
	protected function render($file, $data = array())
	{
		$this->template->set('session', $this->session); // Envoi de la session
		return $this->template->render($file, $data); // On rend la vue
	}

	/** Tentative de connexion d'un utilisateur
	 * @param String $email L'email du compte
	 * @param String $mdp Le mot de passe du compte
	 * @return Bool true si il connecté false sinon
	 */
	protected function connectUser($email, $mdp)
	{
		$user = $this->database->findUser($email); // On cherche l'utlisateur
		if($user === false){ // Si aucun utilisateur n'est trouvé
			$this->session->setMessage("<b>Connexion imposible !</b> Cette email ne corespond à aucun compte"); // On affiche un message d'info
		}else{ // Sinon
			if($user->getMdp()==hash('sha256', $mdp)){ // Si le mot de passe est correct
				$this->session->setMessage("<b>Connexion reussi !</b> Vous étes maintenant connecté", 'valid'); // On affiche un message d'info
				$this->session->set("_user", serialize($user)); // On met à jour sa session
				return true;
			}
			$this->session->setMessage("<b>Connexion imposible !</b> Mot de passe incorect"); // On affiche un message d'info
		}
		return false;
	}

	/**
	 * Déconnection d'un utiilisateur
	 */
	protected function disconnectUser()
	{
		$this->session->setMessage("Vous étes maintenant déconnecté", 'valid'); // On affiche un message d'info
		unset($_SESSION['_user']); // On supprime les information de connexion de la session
	}

	/** Crée une erreur 404
	 * @param String $message Le message d'erreur
	 * @param bool $debug true si le message est un message de developement
	 * @return String le contenue de la vue
	 */
	public function createNotFound($message, $debug = false){
		header('HTTP/1.1 404 Not Found'); // On envoie un header 404 au navigateur
		$message = ($debug && !Config::$debug)?'Inconnue':$message; // On modifie le message selon le debug
		return $this->render("Error/404", array('message' => $message)); // On rend la vue
	}

	/** Crée une erreur 500
	 * @param String $message Le message d'erreur
	 * @param bool $debug true si le message est un message de developement
	 * @return String le contenue de la vue
	 */
	public function createInternalError($message, $debug = false){
		header('HTTP/1.1 500 Internal Server Error'); // On envoie un header 500 au navigateur
		$message = ($debug && !Config::$debug)?'Le serveur ne peut afficher la page demandée':$message; // On modifie le message selon le debug
		return $this->render("Error/404", array('message' => $message)); // On rend la vue
	}

}
?>
