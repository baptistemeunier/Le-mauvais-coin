<?php

/**
 */
class Session
{

	public function set($cle, $valeur){
		$_SESSION[$cle] = $valeur;
		return true;
	}

	public function get($cle){
		return (isset($_SESSION[$cle])?$_SESSION[$cle]:null);
	}

	public function setMessage($message, $type = 'error'){

	}

	public function getMessages(){

	}

	public function is_connect(){

	}

	public function is_admin(){

	}

}