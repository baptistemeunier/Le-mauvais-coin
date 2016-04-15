<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 10/03/16
 * Time: 01:02
 */
class Caterorie
{
	/**
	 * @var Int $id
	 */
	protected $id;

	/**
	 * @var String $categorie
	 */
	protected $categorie;

	/**
	 * @return Int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param Int $id
	 * @return Caterorie
	 */
	public function setId($id)
	{
		$this->id = $id;
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
	 * @return Caterorie
	 */
	public function setCategorie($categorie)
	{
		$this->categorie = $categorie;
		return $this;
	}

	/**
	 * @return array
	 */
	function formOption(){
		return array('value' => $this->id, 'name' => $this->categorie);
	}
}