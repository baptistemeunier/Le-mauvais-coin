<?php

class Annonces
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
		$query = $this->db->query('
			SELECT a.id, a.titre, a.description, a.prix, a.date, a.categorie_id, c.nom as categorie, v.nom as ville
			FROM annonces AS a
			LEFT JOIN categories AS c ON c.id = a.categorie_id
			LEFT JOIN villes AS v ON v.id = a.ville_id
			ORDER BY date DESC');
		$annonces = $query->fetchAll(PDO::FETCH_CLASS, 'Annonce');
		$query->closeCursor();
		return $annonces;
	}

	/**
	 * @param $id
	 * @return false|Annonce
	 */
	public function find($id)
	{
		$query = $this->db->prepare('SELECT a.id, a.titre, a.description, a.prix, a.date, a.categorie_id, c.nom as categorie, v.nom as ville, v.cp, r.id as region, u.email, u.tel
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

	public function findBy($conditions){
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

}