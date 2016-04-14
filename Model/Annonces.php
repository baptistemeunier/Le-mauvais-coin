<?php

class Annonces
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
		$query = $this->db->prepare('SELECT a.id, a.titre, a.description, a.prix, a.date, a.categorie_id, c.nom as categorie, v.nom as ville, v.cp, r.nom as region, u.email, u.tel
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
			if($value == null){
				$temp[] = ' '.$field." IS NULL ";
			}else{
				$temp[] = ' '.$field."= ".$value.' ';
			}
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

	public function add($data, $id)
	{
		$prix = ($data['prix'] == "")?null:$data['prix'];
		$cat = ($data['categorie'] == 0)?null:$data['categorie'];
		$query = $this->db->prepare('INSERT INTO annonces(titre, description, prix, user_id, date, categorie_id, ville_id) VALUES (:titre, :description, :prix, :user_id, :date, :categorie_id, :ville_id)');
		$query->bindParam('titre', $data['titre'], PDO::PARAM_STR);
		$query->bindParam('description', $data['description'], PDO::PARAM_STR);
		$query->bindParam('prix', $prix, PDO::PARAM_STR);
		$query->bindParam('user_id', $id, PDO::PARAM_STR);
		$query->bindParam('date', date("Y-m-d"), PDO::PARAM_STR);
		$query->bindParam('categorie_id', $cat, PDO::PARAM_STR);
		$query->bindParam('ville_id', $data['idVille'], PDO::PARAM_STR);
		$query->execute();
		$query->closeCursor();
		return $this->db->lastInsertId();
	}

	public function delete($id){
		$query = $this->db->prepare('DELETE FROM annonces WHERE id=:id');
		$query->bindParam('id', $id, PDO::PARAM_INT);
		$query->execute();

	}
}