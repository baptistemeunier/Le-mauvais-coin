<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 10/03/16
 * Time: 22:07
 */
class User
{
	protected $mdp;

	/**
	 * @return mixed
	 */
	public function getMdp()
	{
		return $this->mdp;
	}

	/**
	 * @param mixed $mdp
	 */
	public function setMdp($mdp)
	{
		$this->mdp = $mdp;
	}


}