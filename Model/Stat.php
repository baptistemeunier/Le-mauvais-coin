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

	public function getCountCategories(){
		$query = $this->db->query('SELECT nom, COUNT(a.id) AS count FROM categories AS c JOIN annonces AS a ON a.categorie_id = c.id GROUP BY nom ORDER BY count DESC');
		$array = $query->fetchAll();
		$query->closeCursor();
		$categories = [];
		foreach($array as $c){
			$categories[$c['nom']] = $c['count'];
		}
		return $categories;
	}

	public function getCountVille(){
		$query = $this->db->query('SELECT nom, COUNT(a.id) AS count FROM villes AS v JOIN annonces AS a ON a.categorie_id = v.id GROUP BY nom ORDER BY count DESC');
		$array = $query->fetchAll();
		$query->closeCursor();
		$villes = [];
		foreach($array as $v){
			$villes[$v['nom']] = $v['count'];
		}
		return $villes;
	}

	public function getStatGraph(){
		$query = $this->db->query('SELECT COUNT(id) as count, MONTH(date) as month FROM annonces WHERE YEAR(date) = 2016 GROUP BY month;');
		$data = $query->fetchAll();
		$query->closeCursor();
		$stat = [];
		foreach($data as $v){
			$stat[$v['month']] = $v['count'];
		}
		return $stat;
	}
}