<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 15/04/16
 * Time: 02:15
 */
class Request
{
	/**
	 * @var String $url URL saisie par l'utilisateur
	 */
	private $url;

	/**
	 * @var String $Controller
	 */
	private $Controller;

	/**
	 * @var String $Action
	 */
	private $Action;

	/**
	 * @var Array $Params
	 */
	private $Params;

	public function __construct()
	{
		$this->url = $_SERVER['PATH_INFO'];
		$this->parseUrl();
	}

	private function parseUrl()
	{
		$url = trim($this->url, "/"); // Retrait des / inutiles
		$array = explode('/', $url); // Explosion de la chaine en tableau
		$this->Controller = (($array[0] != "")?ucfirst($array[0]):'Annonce')."Controller"; // Controller démandé
		$this->Action = (isset($array[1])?strtolower($array[1]):'index').'Action'; // Action démandée
		$this->Params = array_slice($array, 2); // Parametres éventuelles
	}

	/**
	 * Recupére l'URL de l'utilisateur
	 * @return String
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @return String
	 */
	public function getController()
	{
		return $this->Controller;
	}

	/**
	 * @return Array
	 */
	public function getParams()
	{
		return $this->Params;
	}

	/**
	 * @return String
	 */
	public function getAction()
	{
		return $this->Action;
	}


}