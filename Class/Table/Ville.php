<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 10/03/16
 * Time: 01:14
 */
class Ville
{

	/**
	 * @var Int $id
	 */
	protected $id;

	/**
	 * @var String $ville
	 */
	protected $ville;

	/**
	 * @var Int $cp
	 */
	protected $cp;

	/**
	 * @var Int $region_id
	 */
	protected $region_id;

	/**
	 * @var String $region
	 */
	protected $region;

	/**
	 * @return Int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param Int $id
	 * @return Ville
	 */
	public function setId($id)
	{
		$this->id = $id;
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
	 * @return Ville
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
	 * @return Ville
	 */
	public function setCp($cp)
	{
		$this->cp = $cp;
		return $this;
	}

	/**
	 * @return Int
	 */
	public function getRegionId()
	{
		return $this->region_id;
	}

	/**
	 * @param Int $region_id
	 * @return Ville
	 */
	public function setRegionId($region_id)
	{
		$this->region_id = $region_id;
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
	 * @return Ville
	 */
	public function setRegion($region)
	{
		$this->region = $region;
		return $this;
	}


	/**
	 * @return array
	 */
	function formOption($optgroup = false){
		$value = (($optgroup === true)?'ville-':'').$this->id;
		return array('value' => $value, 'name' => $this->ville);
	}
}