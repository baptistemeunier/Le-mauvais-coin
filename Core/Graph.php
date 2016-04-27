<?php

function rand_color() {
	return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
}
/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 27/04/16
 * Time: 15:21
 */
class Graph
{
	static public function graphColonne($array, $name = "Graphique"){
	$categories = $array;
	/* Trie des categorie par ordre croissant */
	uksort($array, function($a, $b){
		if($a == $b)
			return 0;
		if($a > $b)
			return 1;
		return -1;
	});
	/* Intervalle entre chaque collonne et chaque hauteur de collonne */
	$translate_y = 400/max($array);
<<<<<<< HEAD
	$translate_x = 1000/count($array);
	/* Titre et ouverture du svg */
	echo'<hr><h2 style="margin=1100px;text-align: center;display: block;">'.$name.'</h2><svg style="width: 1100px;height: 600px;">';
		$x = 150;
		for($y=0;$y<=450;$y+=$translate_y){
			echo'<text x="40" y="'.(500-$y).'" style="text-anchor: end;">'.round($y/$translate_y, 1).'</text>';
			echo '<path stroke-width="1px" stroke-opacity="0.3" stroke="#000" d="M 100 '.(500-$y).' l 1000 0"></path>';
=======
	$translate_x = 900/count($array);
	/* Titre et ouverture du svg */
	echo'<hr><h2 style="margin=1000px;text-align: center;display: block;">'.$name.'</h2><svg style="width: 1100px;height: 600px;">';
		$x = 150;
		for($y=0;$y<=450;$y+=$translate_y){
			echo'<text x="40" y="'.(500-$y).'" style="text-anchor: end;">'.round($y/$translate_y, 1).'</text>';
			echo '<path stroke-width="1px" stroke-opacity="0.3" stroke="#000" d="M 100 '.(500-$y).' l 900 0"></path>';
>>>>>>> develop
		}

		foreach($array as $nom => $count){
			$y = $count*$translate_y;
			echo '<path stroke-width="1px" stroke-opacity="0.3" stroke="#000" d="M '.($x).' 500 l 0 -500"></path>';
			echo '<path stroke-width="2px" fill="'.rand_color().'" stroke="#000" d="M '.($x-15).' 500 l 0 -'.$y.' l 30 0 l 0 '.$y.'"></path>';
<<<<<<< HEAD
			$nom = wordwrap($nom, 12, "|", true);
=======
			$nom = wordwrap($nom, 15, "|", true);
>>>>>>> develop
			$nom = explode('|',$nom);
			$y = 525;
			foreach($nom as $l){
				echo'<text x="'.$x.'" y="'.$y.'" style="text-anchor: middle;" font-size="13">'.$l.'</text>';
				$y+=16;
			}
			$x+= $translate_x;
		}
		/* Bordure et Fermeture du SVG */
<<<<<<< HEAD
		echo'<path stroke-width="2px" fill="transparent" stroke="#000" d="M 100 0 L 100 500 L 1100 500"></path></svg>';
=======
		echo'<path stroke-width="2px" fill="transparent" stroke="#000" d="M 100 0 L 100 500 L 1000 500"></path></svg>';
>>>>>>> develop
	}
}