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
		echo $this->render("annonce", array('annonce' => $annonce));
	}

	public function createAction(){
		return $this->render("createannonce");
	}
}