<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 14/03/16
 * Time: 20:35
 **/
class AnnonceController extends App
{
	public function indexAction(){
		/* Récuperation des annonces */
		$annonces = $this->getDBInstance()->findAllAnnonces();
		/* Affichage de la page */
		return $this->render("Annonce/index", array('annonces' => $annonces));
	}

	public function viewAction(){
		$id = (isset($_GET['id']) && is_numeric($_GET['id']))?$_GET['id']:1;

		/* Récuperation de l'annonce */
		$annonce = $this->getDBInstance()->findAnnonce($id);

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
		if(!empty($_POST)){
			/* On verifie */
			if(strlen($_POST['titre']) < 10){ // Si la taille de titre >= 10
				$this->getSession()->setMessage("Le titre de votre annonce doit faire au moins 10 caractères");
			}else if(strlen($_POST['description']) < 15){ // Si la taille de la desctriction >= 15
				$this->getSession()->setMessage("La description de votre annonce doit faire au moins 15 caractères");
			}else{
				$this->getDBInstance()->AddAnnonce($_POST, $this->getSession()->getUser()->getId()); // On ajoute l'annonce
			}
		}

		$categories = $this->getDBInstance()->findAllCategories();
		$cat_divers = new Caterorie();
		$cat_divers->setId(NULL)
			->setCategorie('Divers');
		$categories[] = $cat_divers;
		$villes     = $this->getDBInstance()->findAllVilles();

		return $this->render("Annonce/create", array('form' => new Form($_POST), 'categories' => $categories, 'villes' => $villes));
	}
}