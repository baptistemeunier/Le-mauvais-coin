<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 10/03/16
 * Time: 14:30
 */
class Region
{
	/**
	 * @var Int $id
	 */
	protected $id;

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
	 * @return Region
	 */
	public function setId($id)
	{
		$this->id = $id;
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
	 * @return Region
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
		$value = (($optgroup === true)?'region-':'').$this->id;
		return array('value' => $value, 'name' => $this->region);
	}
}