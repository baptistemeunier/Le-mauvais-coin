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

	public function is_connect(){

	}

	public function is_admin(){

	}

}