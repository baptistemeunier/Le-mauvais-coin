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
		$query = $this->db->query('SELECT a.id, a.titre, a.description, a.prix, a.date, a.categorie_id, c.categorie , v.ville
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
		$query = $this->db->prepare('SELECT a.id, a.titre, a.description, a.prix, a.date, a.categorie_id, c.categorie , v.ville
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
		$query = $this->db->query('SELECT * FROM categories');
		$categories = $query->fetchAll(PDO::FETCH_CLASS, "Caterorie");
		$query->closeCursor();
		return $categories;
	}

	public function findAllVilles(){
		$query = $this->db->query('SELECT * FROM villes');
		$villes = $query->fetchAll(PDO::FETCH_CLASS, "Ville");
		$query->closeCursor();
		return $villes;
	}

	public function findAllRegions()
	{
		$query = $this->db->query('SELECT * FROM regions');
		$regions = $query->fetchAll(PDO::FETCH_CLASS);
		$query->closeCursor();
		return $regions;
	}

	public function AddAnnonce($data)
	{
		dump($data);
		$a = "1";
		$query = $this->db->prepare('INSERT INTO annonces(titre, description, prix, user_id, date, categorie_id, ville_id) VALUES (:titre, :description, :prix, :user_id, :date, :categorie_id, :ville_id)');
		$query->bindParam('titre', $data['titre'], PDO::PARAM_STR);
		$query->bindParam('description', $data['description'], PDO::PARAM_STR);
		$query->bindParam('prix', $data['prix'], PDO::PARAM_STR);
		$query->bindParam('user_id', $a, PDO::PARAM_STR);
		$query->bindParam('date', date("Y-m-d"), PDO::PARAM_STR);
		$query->bindParam('categorie_id', $data['categorie'], PDO::PARAM_STR);
		$query->bindParam('ville_id', $data['ville'], PDO::PARAM_STR);
		$query->execute();
	}

}