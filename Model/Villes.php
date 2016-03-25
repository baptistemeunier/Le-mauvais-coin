<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 23/03/16
 * Time: 17:54
 */
class Villes
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

	public function findAll(){
		$query = $this->db->query('SELECT id, nom as ville FROM villes');
		$villes = $query->fetchAll(PDO::FETCH_CLASS, "Ville");
		$query->closeCursor();
		return $villes;
	}

	public function isExist($ville, $cp, $region){
		$query = $this->db->prepare('SELECT v.id FROM villes AS v JOIN regions AS r on v.region_id = r.id WHERE v.nom = :villeNom AND v.cp = :cp AND r.nom = :regionNom');
		$query->bindParam('villeNom', $ville, PDO::PARAM_INT);
		$query->bindParam('cp', $cp, PDO::PARAM_INT);
		$query->bindParam('regionNom', $region, PDO::PARAM_INT);
		$query->execute();
		$count = $query->rowCount();
		$ville = $query->fetch();
		$query->closeCursor();
		// Le champs villes.nom est unique donc $count vaut soit 0 soit 1
		return ($count == 0)?false:$ville['id'];
	}

	public function add($nom, $cp, $region){
		$query = $this->db->prepare('INSERT INTO villes(nom, cp, region_id) VALUES (:nom, :cp, :region)');
		$query->bindParam('nom', $nom, PDO::PARAM_STR);
		$query->bindParam('cp', $cp, PDO::PARAM_INT);
		$query->bindParam('region', $region, PDO::PARAM_INT);
		$query->execute();
		$query->closeCursor();
		return $this->db->lastInsertId();
	}

}