<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 23/03/16
 * Time: 17:56
 */
class Regions
{
	private $db;

	/**
	 * Annonces constructor.
	 * @param PDO $db
	 */
	public function __construct($db)
	{
		$this->db = $db;
	}

	public function findAll()
	{
		$query = $this->db->query('SELECT id, nom as region FROM regions');
		$regions = $query->fetchAll(PDO::FETCH_CLASS, "Region");
		$query->closeCursor();
		return $regions;
	}

	public function isExist($regionNom){
		$query = $this->db->prepare('SELECT id FROM regions WHERE nom = :nom');
		$query->bindParam('nom', $regionNom, PDO::PARAM_STR);
		$query->execute();
		$count = $query->rowCount();
		$region = $query->fetch();
		$query->closeCursor();
		// Le champs villes.nom est unique donc $count vaut soit 0 soit 1
		return ($count == 0)?false:$region['id'];
	}

	public function add($nom){
		$query = $this->db->prepare('INSERT INTO regions(nom) VALUES (:nom)');
		$query->bindParam('nom', $nom, PDO::PARAM_STR);
		$query->execute();
		$query->closeCursor();
		return $this->db->lastInsertId();

	}
}