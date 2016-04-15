<?php

/**
 * Class Template
 * Classe qui permet de charger et d'afficher la page de rendu final à l'utilisateur
 */

class Template
{
	/** Répertoire des vues
	 * @var String $dir
	 **/
	private $dir;
	/** Données à envoyer à la page
	 * @var Array $data
	 **/
	private $data = array(); // Données a envoyée à la page (Tableau de valeur)

	/**
	 * @param String $dir répertoire des vues
	 **/
	function __construct($dir)
	{
		/* On met le répertoire des vues en memoire */
		$this->dir = ROOT.$dir;
	}

	/** Fonction set
	 * Ajoute une variable à transmettre à la vue
	 * @param String $cle Nom de la variable dans la vue
	 * @param String $valeur Valeur de la variable
	 */
	public function set($cle, $valeur)
	{
		$this->data[$cle] = $valeur;
	}

	/** Fonction render
	 * Génere la page et la retourne
	 * @param String $file Le ficher demandé (sans l'extension .php)
	 * @param Array $data Données suplementaire à envoyer
	 * @return String Le contenue de la vue
	 */
	public function render($file, $data = array())
	{
		extract(array_merge($this->data, $data));
		ob_start();
		include($this->dir.$file.'.php');
		return ob_get_clean();
	}

	public function getUrl($routeName, $params){
		$routes = Config::$route;
		if(isset($routes[$routeName])){
			$route = $routes[$routeName];
			$path = ROOT_RELATIVE.$route['path'];
			foreach($route['Params'] as $k => $p){
				$i = $params[$k];
				if(preg_match('#'.$p.'#', $i)){
					$path = preg_replace('#{'.$k.'}#', $i, $path);
				}
			}
			return $path;
		}
	}
}
?>