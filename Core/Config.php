<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 15/04/16
 * Time: 14:33
 */
class Config
{
	public static $route = array(
		'index' => array(
			'path' => '/',
			'Controller' => 'AnnonceController',
			'Action' => 'indexAction'
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