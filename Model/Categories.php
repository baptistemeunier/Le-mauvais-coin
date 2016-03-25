<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 23/03/16
 * Time: 17:50
 */
class Categories
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
		$query = $this->db->query('SELECT id, nom as categorie FROM categories');
		$categories = $query->fetchAll(PDO::FETCH_CLASS, "Caterorie");
		$query->closeCursor();
		return $categories;
	}


}