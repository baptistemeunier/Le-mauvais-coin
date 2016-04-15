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
		$Controller = $this->request->getController();
		$Action = $this->request->getAction();
		dump($Controller);
		dump($Action);
		if(class_exists($Controller)){
			dump($Controller);
			$Controller = new $Controller($this->request);
			if(method_exists($Controller, $Action)){
				echo $Controller->$Action();
			}else{
				echo'BOOM';
			}
		}else{
			echo'BOOM';
		}
	}
}