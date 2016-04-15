<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 14/03/16
 * Time: 20:35
 **/
class StatController extends Controller
{
	public function indexAction(){
		$stat = $this->getDBInstance("Stat");
		$annonces  = $stat->countAnnonce();
		$users     = $stat->countUsers();
		$categorie = $stat->getMaxCategorie();
		$ville     = $stat->getMaxVille();
		return $this->render("Stat/index", array('annonces' => $annonces, 'users' => $users, 'categorie' => $categorie, 'ville' => $ville));
	}
}