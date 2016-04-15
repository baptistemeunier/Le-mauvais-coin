<?php

/**
 */
class Session
{
	function __construct(){
		if(!isset($_SESSION['_message'])){
			$_SESSION['_message'] = array();
		}
	}
	public function set($cle, $valeur){
		$_SESSION[$cle] = $valeur;
		return true;
	}

	public function get($cle){
		return (isset($_SESSION[$cle])?$_SESSION[$cle]:null);
	}

	public function setMessage($message, $type = 'error'){
		$_SESSION['_message'][$type] = $message;
		return true;
	}

	public function getMessages(){
		$messages = $_SESSION['_message'];
		$_SESSION['_message'] = array();
		return $messages;
	}

	/** Fonction is_connect
	 * Cherche si l'utilisateur est connecté
	 * @return bool true si connecté false sinon
	 */
	public function is_connect(){
		if(isset($_SESSION['_user'])){
			return true;
		}
		return false;
	}

	/** Is
	 * @return User Information de l'utilisateur
	 */
	public function getUser(){
		$user = unserialize($_SESSION['_user']);
		return $user;
	}

	public function is_Admin()
	{
		if(!$this->is_connect()){
			return false;
		}
		return $this->getUser()->isAdmin();
	}

}