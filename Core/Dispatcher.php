<?php
/** Classe Request
 * Cette classe permet de prendre en charche la requete de l'utilisateur
 * et la dirigé vers un controller
 **/


class Dispatcher
{
	/** @var Request $request
	 * Contient la requete de l'utilisateur
	 **/
	private $request;

	/**
	 * Dispatcher constructeur.
	 */
	public function __construct()
	{
		$this->request = new Request(); // Crée une instance de Request avec la requete de l'utilisateur
		$this->findRoute();  // Cherche la route démandée
	}

	/** Fonction findRoute()
	 * Cherche la route démandée et lance la fonction loadController avec les bons paramettres
	 */
	private function findRoute()
	{
		$routes = Config::$route; // Récuperation des routes
		$find = false; // true si une route est trouvée
		$url = $this->request->getUrl(); // Récuperation de L'URL démandée (ex : /annonce-34)

		foreach ($routes as $r) { // On parcourt toute les routes
			$path = $this->getPathRegex($r); // Regex à comparer avec l'URL
			$Params = []; // Liste des paramettres à transmettre
			if (preg_match($path, $url, $matches)) { // Si la REGEX à matcher
				foreach ($matches as $k => $v) { // On parcours tout les matchs
					if (!is_numeric($k)) { // Si l'index n'est pas numerique
						$Params[$k] = $v;  // On l'ajoute au paramettre
					}
				}
				$Controller = $r['Controller']; // Classe à charger
				$Action = $r['Action'];         // Méthods à appeller
				$this->request->setParams($Params); // Ajout des paramettres dans la requete
				$find = true;
				break; // On sort du foreach
			}
		}
		if (!$find) { // Si aucune route n'a était trouvée
			$this->createErrorExpection("DIE : Aucun route trouvé pour l'URI " . $url, 404, true); // On renvois une erreur 404
		} else { // Sinon
			$this->loadController($Controller, $Action); // On charge le controller
		}
	}

	/**
	 * Charge un controller avec son action puis affiche la vue rendu
	 * @param String $ControllerName Le controller à appeler
	 * @param String $Action L'action à appeler
	 */
	private function loadController($ControllerName, $Action)
	{
		 if(class_exists($ControllerName)){
			$Controller = new $ControllerName($this->request);
			if(method_exists($Controller, $Action)){
				echo $Controller->$Action();
			}else{
				$this->error("L'action " . $Action . " pour le controller ". $ControllerName . " n'a pas été trouvée", 500);
			}
		}else{
			 $this->error("Le controller ". $ControllerName . " n'a pas été trouvée", 500);
		}
	}


	/**
	 * @param $route
	 * @return mixed
	 */
	private function getPathRegex($route)
	{
		$count = preg_match_all('#{([a-zA-Z]+)}#', $route['path'], $matches);
		for ($i = 0; $i < $count; $i++) {
			$matches[0][$i] = "%" . $matches[0][$i] . "%";
			$matches[1][$i] = "(?P<" . $matches[1][$i] . ">" . $route['Params'][$matches[1][$i]] . ")";
		}
		return preg_replace($matches[0], $matches[1], "#^" . $route['path'] . "$#");
	}

	private function createErrorExpection($message, $code, $debug = false)
	{
		if($code == 404){
			$e = new NotFoundException($message);
		}else if($code == 500){
			$e = new InternalErrorException($message);
		}else{
			$e = new Exception();
		}
		throw $e;
	}

}