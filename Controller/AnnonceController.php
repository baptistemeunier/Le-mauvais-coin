<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 14/03/16
 * Time: 20:35
 **/
class AnnonceController extends Controller
{
	public function indexAction(){
		/* Récuperation des annonces */
		$annonces = $this->getDBInstance('Annonces')->findAll();
		/* Affichage de la page */
		return $this->render("Annonce/index", array('annonces' => $annonces));
	}

	public function viewAction(){
		$id = $this->request->getParam('id');
		/* Récuperation de l'annonce */
		$annonce = $this->getDBInstance("Annonces")->find($id);

		/* Envoie du titre à la vue */
		$this->getTemplate()->set("titre", $annonce->getTitre());
		$this->getTemplate()->set("title", $annonce->getTitre().' - Le mauvais coin');

		/* Affichage de la page */
		return $this->render("Annonce/view", array('annonce' => $annonce));
	}

	public function createAction(){
		/* Si l'utilisateur n'est pas connecté */
		if(!$this->getSession()->is_connect()){
			$this->getSession()->setMessage("Veuillez vous connecté pour accedée à cette page", 'attention'); // on affiche l'erreur
			header('Location: index.php?page=user/connect&before=annonce/create'); // On le redirige vers la connection
			exit();
		}

		/* Si le formulaire est remplie */
		$post = $_POST;
		if(!empty($post)){
			/* On verifie les données postées */
			if(strlen($post['titre']) < 10){ // Si la taille de titre >= 10
				$this->getSession()->setMessage("Le titre de votre annonce doit faire au moins 10 caractères");
			}else if(strlen($post['description']) < 15) { // Si la taille de la desctriction >= 15
				$this->getSession()->setMessage("La description de votre annonce doit faire au moins 15 caractères");
			}else if(strlen($post['ville_nom']) < 4){ // Si il ajoute une ville et que son nom nest trop court
				$this->getSession()->setMessage("Merci de saisir une ville correcte");
			}else if(strlen($post['ville_cp']) != 5 || !is_numeric($post['ville_cp'])){ // Si il ajoute une ville et que son code postal est incorect
				$this->getSession()->setMessage("Merci de saisir un code postal correct");
			}else if(strlen($post['ville_region']) < 4){ // Si il ajoute une ville et que sa region est trop courte
				$this->getSession()->setMessage("Merci de saisir une region correcte");
			}else{
				$villesDB = $this->getDBInstance("Villes");
				$nomVille = ucfirst(strtolower($post['ville_nom']));
				$nomRegion = ucfirst(strtolower($post['ville_region']));

				$idVille = $villesDB->isExist($nomVille, $post['ville_cp'], $nomRegion);
				if(!$idVille){
					$regionDB = $this->getDBInstance("Regions");
					$idRegion = $regionDB->isExist($nomRegion);
					if(!$idRegion){
						$idRegion = $regionDB->add($nomRegion);
					}
					$idVille = $villesDB->add($nomVille, $post['ville_cp'], $idRegion);
				}
				$post['idVille'] = $idVille;
				$id = $this->getDBInstance("Annonces")->add($post, $this->getSession()->getUser()->getId()); // On ajoute l'annonce
				$this->getSession()->setMessage("Annonce en ligne !", "valid");

				header('Location: '.ROOT_RELATIVE.'/annonce/view/'.$id); // On le redirige vers l'annoncne
				exit();
			}
		}

		$categories = $this->getDBInstance("Categories")->findAll();
		$cat_divers = new Caterorie();
		$cat_divers->setId(0)
			->setCategorie('Divers');
		$categories[] = $cat_divers;

		return $this->render("Annonce/create", array('form' => new Form($_POST), 'categories' => $categories));
	}

	public function deleteAction(){
		$this->getDBInstance("Annonces")->delete($this->request->getParams()[0]);
		$this->getSession()->setMessage("Annonce supprimmée avec succés !", "valid");

		header('Location: '.ROOT_RELATIVE); // On le redirige vers l'annoncne
		exit();
	}
}