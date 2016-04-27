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
		$categories = $stat->getCountCategories();
		$ville     = $stat->getCountVille();
		$graph     = $stat->getStatGraph();
		return $this->render("Stat/index", array('annonces' => $annonces, 'users' => $users, 'categories' => $categories, 'ville' => $ville, 'graph' => $graph));
	}
}