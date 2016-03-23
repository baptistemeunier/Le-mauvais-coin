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
	 * @param $db
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

}