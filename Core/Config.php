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
		'inscription' => array(
			'path' => '/inscription',
			'Controller' => 'UserController',
			'Action' => 'inscriptionAction'
		),
		'connexion' => array(
			'path' => '/login',
			'Controller' => 'UserController',
			'Action' => 'connectAction'
		)
	);
}