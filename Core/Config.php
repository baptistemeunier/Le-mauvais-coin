<?php
/**
 * Classe Config
 *
 * Classe Statique contenant toute la configuration de l'application.
 * Elle contient par exemple les routes et les variables de connexion à la BDD.
 **/
class Config
{
	/** Liste des routes
	 * @var array $route Ensemble des routes de l'application
	 * Les routes seront lues et parse par le Dispatcher
	 */
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
		'view_categorie' => array(
			'path' => '/recherche-par-categorie-{id}',
			'Controller' => 'SearchController',
			'Action' => 'categoriesAction',
			'Params' => array(
				'id' => '[0-9]+'
			)
		),
		'liste_categories' => array(
			'path' => '/recherche-par-categorie',
			'Controller' => 'SearchController',
			'Action' => 'categoriesAction',
		),
		'view_ville' => array(
			'path' => '/recherche-par-ville-{id}',
			'Controller' => 'SearchController',
			'Action' => 'villesAction',
			'Params' => array(
				'id' => '[0-9]+'
			)
		),
		'list_villes' => array(
			'path' => '/recherche-par-ville',
			'Controller' => 'SearchController',
			'Action' => 'villesAction',
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
		'delete_annonce' => array(
			'path' => '/admin/delete-annonce-{id}',
			'Controller' => 'AnnonceController',
			'Action' => 'deleteAction',
			'Params' => array(
				'id' => '[0-9]+'
			)
		),
	);

	/** Variable Debug
	 * @var bool $debug Affchage ou non des erreurs de developement
	 * Ex : Si Erreur 500 et $debug = false alors on n'aura pas la raison de l'erreur.
	 */
	public static $debug = true;

	/** Information de connection à la base de données
	 * @var array Parametre de connexion
	 */
	public static $db = array(
		'db_host' => 'localhost',
		'db_name' => 'projet',
		'db_login' => 'root',
		'db_pass' => '',
	);

	/** Répertoire contenant les Vues
	 * @var string
	 */
	public static $viewDir = '/View/';
}
