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
		$this->loadController();
	}

	private function loadController()
	{
		$routes = Config::$route;
		foreach($routes as $r){
			if(preg_match('%^'.$r['path'].'$%', $this->request->getUrl(), $matches)){
				dump($r);
				dump($matches);
				$Controller = $r['Controller'];
				$Action = $r['Action'];
				if(class_exists($Controller)){
					$Controller = new $Controller($this->request);
					if(method_exists($Controller, $Action)){
						echo $Controller->$Action();
					}else{
						echo'BOOM Action';
					}
				}else{
					echo'BOOM Ctrl';
				}
			}
		}
	/*
		$Controller = $this->request->getController();
		$Action = $this->request->getAction();
		dump($Controller);
		dump($Action);
	*/
	}

}