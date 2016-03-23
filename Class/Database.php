<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 08/03/16
 * Time: 13:05
 */
class Database
{
	private $db;

	/**
	 * @param String $host Serveur
	 * @param String $db Base de donnée
	 * @param String $login Nom d'utilisateur
	 * @param String $password Mot de passe
	 */
	function __construct($host, $db, $login, $password)
	{
		try
		{
			$this->db = new PDO('mysql:host='.$host.';dbname='.$db.';charset=utf8', $login, $password);
		}
		catch (Exception $e)
		{
			die('Message d\'erreur : ' . $e->getMessage());
		}
	}

	public function getDB(){
		return $this->db;
	}


	public function AddAnnonce($data, $id)
	{
		$prix = ($data['prix'] == "")?null:$data['prix'];
		$query = $this->db->prepare('INSERT INTO annonces(titre, description, prix, user_id, date, categorie_id, ville_id) VALUES (:titre, :description, :prix, :user_id, :date, :categorie_id, :ville_id)');
		$query->bindParam('titre', $data['titre'], PDO::PARAM_STR);
		$query->bindParam('description', $data['description'], PDO::PARAM_STR);
		$query->bindParam('prix', $prix, PDO::PARAM_STR);
		$query->bindParam('user_id', $id, PDO::PARAM_STR);
		$query->bindParam('date', date("Y-m-d"), PDO::PARAM_STR);
		$query->bindParam('categorie_id', $data['categorie'], PDO::PARAM_STR);
		$query->bindParam('ville_id', $data['ville'], PDO::PARAM_STR);
		$query->execute();
		return $this->db->lastInsertId();
	}

	/** Fonction findUser
	 * Recherche un utilisateur
	 * @param String $email L'email du compte
	 * @return User|false mixed L'utilisateur ou false si aucun n'est trouvé
	 */
	public function findUser($email)
	{
		$query = $this->db->prepare('SELECT * FROM users WHERE email=:email');
		$query->bindParam('email', $email, PDO::PARAM_STR);
		$query->execute();
		$user = $query->fetchObject("User");
		$query->closeCursor();
		return $user;
	}

	public function addVille($nom, $cp, $region)
	{
		$query = $this->db->prepare('INSERT INTO ville(nom, cp, region_id) VALUES (:nom, :cp, :region_id)');
		$query->bindParam('nom', $nom, PDO::PARAM_STR);
		$query->bindParam('cp', $cp, PDO::PARAM_STR);
		$query->bindParam('region_id', $region, PDO::PARAM_STR);
		$query->execute();
		$query->closeCursor();
	}

	public function AddRegion($region)
	{
		$query = $this->db->query('SELECT id FROM regions WHERE region=:nom');
		$query->bindParam('nom', $region, PDO::PARAM_STR);
		$query->execute();
		$region = $query->fetch();
		$query->closeCursor();
		if($region){
			return $region['id'];
		}
		$query = $this->db->prepare('INSERT INTO regions(nom) VALUES (:nom)');
		$query->bindParam('nom', $region, PDO::PARAM_STR);
		$query->execute();
		$query->closeCursor();
		return $this->db->lastInsertId();

	}

}