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
	 * @param $db
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

}