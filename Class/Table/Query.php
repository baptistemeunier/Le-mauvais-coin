<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 08/03/16
 * Time: 15:19
 */
class Query
{
	private $db;
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
		return $query->fetchAll(PDO::FETCH_CLASS, 'Annonce');
	}

	public function findAnnoncesByCategorie($id){
		$query = $this->db->prepare('SELECT a.id, a.titre, a.description, a.prix, a.date, a.categorie_id, c.categorie , v.ville
		FROM annonces AS a
		LEFT JOIN categories AS c ON c.id = a.categorie_id
		LEFT JOIN villes AS v ON v.id = a.ville_id
		WHERE a.categorie_id = :id
		ORDER BY date DESC');
		$query->bindParam('id', $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_CLASS, 'Annonce');
	}

	public function findAnnoncesByVille($id){
		$query = $this->db->prepare('SELECT a.id, a.titre, a.description, a.prix, a.date, a.categorie_id, c.categorie , v.ville
		FROM annonces AS a
		LEFT JOIN categories AS c ON c.id = a.categorie_id
		LEFT JOIN villes AS v ON v.id = a.ville_id
		WHERE a.ville_id = :id
		ORDER BY date DESC');
		$query->bindParam('id', $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_CLASS, 'Annonce');
	}

	public function findAllCategories(){
		$query = $this->db->query('SELECT * FROM categories');
		return $query->fetchAll(PDO::FETCH_CLASS);
	}

	public function findAllVilles(){
		$query = $this->db->query('SELECT * FROM villes');
		return $query->fetchAll(PDO::FETCH_CLASS);
	}

}