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
	 * Dispatcher constructor.
	 */
	public function __construct()
	{
		$this->request = new Request();
		$this->findRoute();
	}

	private function findRoute()
	{
		$routes = Config::$route;
		$find = false;
		$url = $this->request->getUrl();

		foreach ($routes as $r) {
			$path = $this->getPathRegex($r);
			$Params = [];
			if (preg_match($path, $url, $matches)) {
				foreach ($matches as $k => $v) {
					if (!is_numeric($k)) {
						$Params[$k] = $v;
					}
				}
				$Controller = $r['Controller'];
				$Action = $r['Action'];
				$this->request->setParams($Params);
				$find = true;
				break;
			}
		}
		if (!$find) {
			$this->error("DIE : Aucun route trouvé pour l'URI " . $url, 404);
		} else {
			$this->loadController($Controller, $Action, $Params);
		}
	}

	private function loadController($ControllerName, $Action, $Params)
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


	private function getPathRegex($route)
	{
		$count = preg_match_all('#{([a-zA-Z]+)}#', $route['path'], $matches);
		for ($i = 0; $i < $count; $i++) {
			$matches[0][$i] = "%" . $matches[0][$i] . "%";
			$matches[1][$i] = "(?P<" . $matches[1][$i] . ">" . $route['Params'][$matches[1][$i]] . ")";
		}
		return preg_replace($matches[0], $matches[1], "#^" . $route['path'] . "$#");
	}

	private function error($message, $code){
		$Controller = new Controller($this->request);
		if($code == 404){
			echo $Controller->createNotFound($message, true);
		}else{
			echo $Controller->createInternalError($message, true);
		}
	}

}