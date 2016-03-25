<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 23/03/16
 * Time: 19:59
 */
class Users
{
	/** @var PDO $db **/
	private $db;

	/**
	 * Annonces constructor.
	 * @param $db
	 */
	public function __construct($db)
	{
		$this->db = $db;
	}

	/**
	 * @return array
	 */
	public function findAll()
	{
		$query = $this->db->query('SELECT * FROM users');
		$users = $query->fetchAll(PDO::FETCH_CLASS, 'User');
		$query->closeCursor();
		return $users;
	}

	public function add($user)
	{
		$user['tel'] = ($user['tel'] == "")?$user['tel']:null;
		$query = $this->db->prepare('INSERT INTO users(email, tel, mdp) VALUES (:email, :tel, :mdp)');
		$query->bindParam('email', $user['email'], PDO::PARAM_STR);
		$query->bindParam('tel', $user['tel'], PDO::PARAM_STR);
		$query->bindParam('mdp', hash('sha256', $user['mdp']), PDO::PARAM_STR);
		$query->execute();
		$query->closeCursor();
	}

}