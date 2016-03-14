<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 14/03/16
 * Time: 20:35
 **/
class SearchController extends App
{
	public function categoriesAction(){
		$categorie = (isset($_GET['cat']) && is_numeric($_GET['cat']))?$_GET['cat']:null;

		if($categorie){ // Si une categorie est choisie
			/* Alors on récupére les annonces */
			$annonces = $this->getDBInstance()->findAnnoncesBy(array('a.categorie_id' => $categorie));
			return $this->render("Annonce/index", array('titre' => "Recherche par categorie", 'annonces' => $annonces));
		}else{
			/* Sinon on récupére toute les categories */
			$categories = $this->getDBInstance()->findAllCategories();
			return $this->render("Search/categories", array('titre' => "Liste des categories disponible", 'categories' => $categories));
		}
	}

	public function villesAction(){
		$ville = (isset($_GET['ville']) && is_numeric($_GET['ville']))?$_GET['ville']:null;

		if($ville){ // Si une categorie est choisie
			/* Alors on récupére les annonces */
			$annonces = $this->getDBInstance()->findAnnoncesBy(array('a.ville_id' => $ville));
			return $this->render("Annonce/index", array('titre' => "Recherche par ville", 'annonces' => $annonces));
		}else{
			/* Sinon on récupére toute les villes */
			$villes = $this->getDBInstance()->findAllVilles();
			return $this->render("Search/villes", array('titre' => "Liste des villes disponible", 'villes' => $villes));
		}

	}

	public function avanceAction(){

		/* Selection de toute les categories, villes, regions */
		$categories = $this->getDBInstance()->findAllCategories();
		$villes     = $this->getDBInstance()->findAllVilles();
		$regions    = $this->getDBInstance()->findAllRegions();
		$annonces   = array(); // Va contenir les annonces trouvée

		if(!empty($_POST)){ // Si des donnée son postée
			$champs = array();
			if($_POST['categorie'] != 'none'){ // Si recherche par catégorie
				$champs['a.categorie_id'] = $_POST['categorie']; // On ajoute une condition sur a.categorie_id
			}
			if($_POST['localisation'] != 'none'){ // Si recherche par ville/regions
				$temp = explode('-', $_POST['localisation']);
				if($temp[0] == 'region'){ // Si regions
					$champs['v.region_id'] = $temp[1];  // On ajoute une condition sur v.region_id
				}else{ // sinon c'est une ville
					$champs['v.id'] = $temp[1];  // On ajoute une condition sur v.id
				}
			}
			if($_POST['prix-mini'] != '' && $_POST['prix-max'] != '' && $_POST['prix-max'] >= $_POST['prix-mini']){
				/* On ajjoute des contraintes sur le prix si demmandé */
				$champs['a.prix >'] = $_POST['prix-mini'];
				$champs['a.prix <'] = $_POST['prix-max'];
			}
			/* On cherche les annonces */
			$annonces = $this->getDBInstance()->findAnnoncesBy($champs);
		}

		echo $this->render("Search/avance", array('form' => new Form($_POST),'categories' => $categories, 'villes' => $villes, 'regions' => $regions, 'annonces' => $annonces));
	}
}