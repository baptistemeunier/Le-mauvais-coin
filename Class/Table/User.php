<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 10/03/16
 * Time: 22:07
 */
class User
{
	/** L'identifiant dans la table
	 * @return Int $id
	 */
	protected $id;

	/** Email de l'utilisateur
	 * @return String $email
	 */
	protected $email;

	/** Télephone de l'utilisateur
	 * @return String $tel
	 */
	protected $tel;

	/** Mot de passe de l'utilisateur (sha256)
	 * @return String $mpd
	 */
	protected $mdp;

	/**
	 * @return Bool $admin
	 */
	protected $admin;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 * @return User
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 * @return User
	 */
	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTel()
	{
		return ($this->tel == "")?"Aucun tel":$this->tel;
	}

	/**
	 * @param mixed $tel
	 * @return User
	 */
	public function setTel($tel)
	{
		$this->tel = $tel;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMdp()
	{
		return $this->mdp;
	}

	/**
	 * @param mixed $mdp
	 * @return User
	 */
	public function setMdp($mdp)
	{
		$this->mdp = $mdp;
		return $this;
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
	 * @return User
	 */
	public function setAdmin($admin)
	{
		$this->admin = $admin;
		return $this;
	}

}