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

	protected $admin;

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

	/**
	 * @return mixed
	 */
	public function isAdmin()
	{
		return boolval($this->admin);
	}

	/**
	 * @param mixed $admin
	 */
	public function setAdmin($admin)
	{
		$this->admin = $admin;
	}


}