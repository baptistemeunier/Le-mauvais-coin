<?php


class SearchController extends Controller
{
/*
	public function indexAction(){
		return $this->render("Search/index", []);
	}
*/
	public function categoriesAction(){
		$categorie = $this->request->getParam('id');
		if($categorie !== null){ // Si une categorie est choisie
			/* Alors on récupére les annonces */
			$annonces = $this->getDBInstance("Annonces")->findBy(array('a.categorie_id' => ($categorie == 0)?null:$categorie));
			return $this->render("Annonce/index", array('titre' => "Recherche par categorie", 'annonces' => $annonces));
		}else{
			/* Sinon on récupére toute les categories */
			$categories = $this->getDBInstance("Categories")->findAll();
			$categorie = new Caterorie();
			$categories[] = $categorie->setId(0)->setCategorie("Divers");
			return $this->render("Search/categories", array('titre' => "Liste des categories disponible", 'categories' => $categories));
		}
	}

	public function villesAction(){
		$ville = $this->request->getParam('id');

		if($ville){ // Si une categorie est choisie
			/* Alors on récupére les annonces */
			$annonces = $this->getDBInstance("Annonces")->findBy(array('a.ville_id' => $ville));
			return $this->render("Annonce/index", array('titre' => "Recherche par ville", 'annonces' => $annonces));
		}else{
			/* Sinon on récupére toute les villes */
			$villes = $this->getDBInstance("Villes")->findAll();
			return $this->render("Search/villes", array('titre' => "Liste des villes disponible", 'villes' => $villes));
		}

	}

	public function indexAction(){

		/* Selection de toute les categories, villes, regions */
		$categories = $this->getDBInstance("Categories")->findAll();
		$categorie = new Caterorie();
		$categories[] = $categorie->setId(0)->setCategorie("Divers");
		$categorie = new Caterorie();
		$categories[] = $categorie->setId('none')->setCategorie("Toute les catégories");
		$villes     = $this->getDBInstance("Villes")->findAll();
		$ville      = new Ville();
		$villes[]   = $ville->setId('none')->setVille("Toute les villes");
		$regions    = $this->getDBInstance("Regions")->findAll();
		$annonces   = array(); // Va contenir les annonces trouvée

		if(!empty($_POST)){ // Si des donnée son postée
			$champs = array();
			if($_POST['categorie'] != 'none'){ // Si recherche par catégorie
				$champs['a.categorie_id'] = ($_POST['categorie'] != 0)?$_POST['categorie']:null; // On ajoute une condition sur a.categorie_id
			}
			if($_POST['localisation'] != 'ville-none'){ // Si recherche par ville/regions
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
			$annonces = $this->getDBInstance("Annonces")->findBy($champs);
		}

		echo $this->render("Search/index", array('form' => new Form($_POST),'categories' => $categories, 'villes' => $villes, 'regions' => $regions, 'annonces' => $annonces));
	}
}