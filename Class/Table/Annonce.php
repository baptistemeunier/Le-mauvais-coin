<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 08/03/16
 * Time: 09:05
 */
class Annonce extends Table
{

	public function getTitreFormat(){
		return substr($this->titre, 0, 30).((strlen($this->titre) > 30)?" ...":"");
	}
	public function getPrixFormat(){
		if($this->prix == NULL){
			return "";
		}
		if(is_numeric($this->prix)){
			return $this->prix." €";
		}
		return $this->prix;
	}
	public function getCategorieFormat(){
		return ($this->categorie == NULL)?"Divers":$this->categorie;
	}

	public function getDateFormat(){
		$date = new DateTime($this->date);
		$now = new DateTime("today");
		$diff = $now->diff($date);
		return "Il y a ".$diff->days." jours";
	}
}