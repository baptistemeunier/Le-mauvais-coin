<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 15/04/16
 * Time: 00:09
 */
class Stat
{

	/**
	 * Annonces constructor.
	 * @param $db
	 */
	public function __construct($db)
	{
		$this->db = $db;
	}

	public function countAnnonce(){
		$query = $this->db->query('SELECT COUNT(*) AS count FROM annonces');
		$annonces = $query->fetch();
		$query->closeCursor();
		return $annonces['count'];
	}

	public function countUsers(){
		$query = $this->db->query('SELECT COUNT(*) AS count FROM users');
		$users = $query->fetch();
		$query->closeCursor();
		return $users['count'];
	}

	public function getMaxCategorie(){
		$query = $this->db->query('SELECT nom, COUNT(a.id) AS count FROM categories AS c JOIN annonces AS a ON a.categorie_id = c.id GROUP BY nom ORDER BY count DESC LIMIT 1');
		$categorie = $query->fetch();
		$query->closeCursor();
		return $categorie;
	}

	public function getMaxVille(){
		$query = $this->db->query('SELECT nom, COUNT(a.id) AS count FROM villes AS v JOIN annonces AS a ON a.categorie_id = v.id GROUP BY nom ORDER BY count DESC LIMIT 1');
		$ville = $query->fetch();
		$query->closeCursor();
		return $ville;
	}

}