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

	public function findAllAnnonces(){
		$query = $this->db->query('SELECT a.id, a.titre, a.description, a.prix, a.date, a.categorie_id, c.nom as categorie , v.nom as ville
		FROM annonces AS a
		LEFT JOIN categories AS c ON c.id = a.categorie_id
		LEFT JOIN villes AS v ON v.id = a.ville_id
		ORDER BY date DESC');
		$annonces = $query->fetchAll(PDO::FETCH_CLASS, 'Annonce');
		$query->closeCursor();
		return $annonces;
	}

	public function findAnnoncesBy($conditions){
		$temp = array();
		foreach($conditions as $field => $value){
			$temp[] = ' '.$field."= ".$value.' ';
		}
		$where = "WHERE ".implode("AND", $temp);
		$query = $this->db->prepare('SELECT a.id, a.titre, a.description, a.prix, a.date, a.categorie_id, c.nom as categorie , v.nom as ville
		FROM annonces AS a
		LEFT JOIN categories AS c ON c.id = a.categorie_id
		LEFT JOIN villes AS v ON v.id = a.ville_id
		 '.$where.'
		ORDER BY date DESC');
		$query->bindParam('id', $id, PDO::PARAM_INT);
		$query->execute();
		$annonces = $query->fetchAll(PDO::FETCH_CLASS, 'Annonce');
		$query->closeCursor();
		return $annonces;
	}

	public function findAllCategories(){
		$query = $this->db->query('SELECT id, nom as categorie FROM categories');
		$categories = $query->fetchAll(PDO::FETCH_CLASS, "Caterorie");
		$query->closeCursor();
		return $categories;
	}

	public function findAllVilles(){
		$query = $this->db->query('SELECT id, nom as ville FROM villes');
		$villes = $query->fetchAll(PDO::FETCH_CLASS, "Ville");
		$query->closeCursor();
		return $villes;
	}

	public function findAllRegions()
	{
		$query = $this->db->query('SELECT id, nom as region FROM regions');
		$regions = $query->fetchAll(PDO::FETCH_CLASS, "Region");
		$query->closeCursor();
		return $regions;
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

	/**
	 * @param $id
	 * @return false|Annonce
	 */
	public function findAnnonce($id)
	{
		$query = $this->db->prepare('SELECT a.id, a.titre, a.description, a.prix, a.date, a.categorie_id, c.categorie, v.ville, v.cp, r.region, u.email, u.tel
		FROM annonces AS a
		LEFT JOIN categories AS c ON c.id = a.categorie_id
		LEFT JOIN villes AS v ON v.id = a.ville_id
		LEFT JOIN regions AS r ON r.id = v.region_id
		LEFT JOIN users AS u ON u.id = a.user_id
		WHERE a.id = :id
		ORDER BY date DESC');
		$query->bindParam('id', $id, PDO::PARAM_INT);
		$query->execute();
		$annonce = $query->fetchObject('Annonce');
		$query->closeCursor();
		return $annonce;
	}

	/**
	 * @return array
	 */
	public function findUsers()
	{
		$query = $this->db->query('SELECT * FROM users');
		$users = $query->fetchAll(PDO::FETCH_CLASS, 'User');
		$query->closeCursor();
		return $users;
	}

	public function AddUser($user)
	{
		$user['tel'] = ($user['tel'] == "")?$user['tel']:null;
		$query = $this->db->prepare('INSERT INTO users(email, tel, mdp) VALUES (:email, :tel, :mdp)');
		$query->bindParam('email', $user['email'], PDO::PARAM_STR);
		$query->bindParam('tel', $user['tel'], PDO::PARAM_STR);
		$query->bindParam('mdp', hash('sha256', $user['mdp']), PDO::PARAM_STR);
		$query->execute();
		$query->closeCursor();
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