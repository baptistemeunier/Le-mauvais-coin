<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 08/03/16
 * Time: 09:05
 */
class Annonce
{

	/**
	 * @var Int
	 */
	protected $id;

	/**
	 * @var String
	 */
	protected $titre;

	/**
	 * @var String
	 */
	protected $description;

	/**
	 * @var String
	 */
	protected $prix;

	/**
	 * @var String
	 */
	protected $date;

	/**
	 * @var Int
	 */
	protected $categorie_id;

	/**
	 * @var String|null
	 */
	protected $categorie;

	/**
	 * @var String
	 */
	protected $ville;

	/**
	 * @var Int
	 */
	protected $cp;

	/**
	 * @var String
	 */
	protected $region;

	/**
	 * @var String
	 */
	protected $email;


	/**
	 * @var Int|null
	 */
	protected $tel;

	/**
	 * @return Int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param Int $id
	 * @return Annonce
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return String
	 */
	public function getTitre()
	{
		return $this->titre;
	}

	/**
	 * @param String $titre
	 * @return Annonce
	 */
	public function setTitre($titre)
	{
		$this->titre = $titre;
		return $this;
	}

	/**
	 * @return String
	 */
	public function getDescription()
	{
		return str_replace("\n","<br/>", $this->description);
	}

	/**
	 * @param String $description
	 * @return Annonce
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}

	/**
	 * @return String
	 */
	public function getPrix()
	{
		return $this->prix;
	}

	/**
	 * @param String $prix
	 * @return Annonce
	 */
	public function setPrix($prix)
	{
		$this->prix = $prix;
		return $this;
	}

	/**
	 * @return String
	 */
	public function getDate()
	{
		return $this->date;
	}

	/**
	 * @param String $date
	 * @return Annonce
	 */
	public function setDate($date)
	{
		$this->date = $date;
		return $this;
	}

	/**
	 * @return Int
	 */
	public function getCategorieId()
	{
		return $this->categorie_id;
	}

	/**
	 * @param Int $categorie_id
	 * @return Annonce
	 */
	public function setCategorieId($categorie_id)
	{
		$this->categorie_id = $categorie_id;
		return $this;
	}

	/**
	 * @return String
	 */
	public function getCategorie()
	{
		return $this->categorie;
	}

	/**
	 * @param String $categorie
	 * @return Annonce
	 */
	public function setCategorie($categorie)
	{
		$this->categorie = $categorie;
		return $this;
	}

	/**
	 * @return String
	 */
	public function getVille()
	{
		return $this->ville;
	}

	/**
	 * @param String $ville
	 * @return Annonce
	 */
	public function setVille($ville)
	{
		$this->ville = $ville;
		return $this;
	}


	/**
	 * @return Int
	 */
	public function getCp()
	{
		return $this->cp;
	}

	/**
	 * @param Int $cp
	 * @return Annonce
	 */
	public function setCp($cp)
	{
		$this->cp = $cp;
		return $this;
	}

	/**
	 * @return String
	 */
	public function getRegion()
	{
		return $this->region;
	}

	/**
	 * @param String $region
	 * @return Annonce
	 */
	public function setRegion($region)
	{
		$this->region = $region;
		return $this;
	}

	/**
	 * @return String
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param String $email
	 * @return Annonce
	 */
	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return Int|null
	 */
	public function getTel()
	{
		return ($this->tel)?$this->tel:"Non communiqué";
	}

	/**
	 * @param Int|null $tel
	 * @return Annonce
	 */
	public function setTel($tel)
	{
		$this->tel = $tel;
		return $this;
	}

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