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


	/**
	 * @var Array $post
	 */
	private $post;

	public function __construct()
	{
		$this->url = isset($_SERVER['PATH_INFO'])?$_SERVER['PATH_INFO']:"/";
		$this->post = $_POST;
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
	 * @return mixed
	 */
	public function getParam($key)
	{
		return isset($this->Params[$key])?$this->Params[$key]:null;
	}
	/**
	 * @return String
	 */
	public function getAction()
	{
		return $this->Action;
	}

	/**
	 * @param Array $Params
	 */
	public function setParams($Params)
	{
		$this->Params = $Params;
	}

	public function getPost()
	{
		return $this->post;
	}

	public function getPostData($key)
	{
		return isset($this->post[$key])?$this->post[$key]:null;
	}

}