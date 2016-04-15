<?php

class Config
{
	public static $route = array(
		'index' => array(
			'path' => '/',
			'Controller' => 'AnnonceController',
			'Action' => 'indexAction'
		),
		'view_annonce' => array(
			'path' => '/annonce-{id}',
			'Controller' => 'AnnonceController',
			'Action' => 'viewAction',
			'Params' => array(
				'id' => '[0-9]+'
			)
		),
		'list_villes' => array(
			'path' => '/recherche-par-ville',
			'Controller' => 'SearchController',
			'Action' => 'villesAction',
		),
		'liste_categories' => array(
			'path' => '/recherche-par-categorie',
			'Controller' => 'SearchController',
			'Action' => 'categoriesAction',
		),
		'recherche_avance' => array(
			'path' => '/recherche-avancee',
			'Controller' => 'SearchController',
			'Action' => 'avanceAction',
		),
		'inscription' => array(
			'path' => '/inscription',
			'Controller' => 'UserController',
			'Action' => 'inscriptionAction'
		),
		'login' => array(
			'path' => '/login',
			'Controller' => 'UserController',
			'Action' => 'connectAction'
		),
		'statistiques' => array(
			'path' => '/statistiques',
			'Controller' => 'StatController',
			'Action' => 'indexAction',
		),
		'create_annonce' => array(
			'path' => '/ajouter-votre-annonce',
			'Controller' => 'AnnonceController',
			'Action' => 'createAction'
		),
		'list_users' => array(
			'path' => '/admin/list-users',
			'Controller' => 'UserController',
			'Action' => 'adminAction',
		),
	);
}