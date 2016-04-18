<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 14/03/16
 * Time: 20:35
 **/
class UserController extends Controller
{
	public function inscriptionAction(){

		$this->getTemplate()->set("titre", 'Procedure d\'inscription sur le Mauvais Coin');

		/* Si connecté on le redirige vers l'acceueil */
		if($this->getSession()->is_connect()){
			header('Location: '.ROOT_RELATIVE);
			exit();
		}
		$request = $this->request; // Récuperation de la requete
		if(!empty($this->request->getPost())){ // Si des données

			if($request->getPostData('email') == "" || preg_match("%^[a-zA-Z0-9.]+@[a-zA-Z]+.[a-z.]+$%", $request->getPostData('email')) == 0){
				/* Si l'email est vide OU si l'email est incorecte */
				$this->getSession()->setMessage("L'email saisie est incorecte");
			}else if($request->getPostData('tel') != "" && (!is_numeric($request->getPostData('tel')) || strlen($request->getPostData('tel')) != 10)){
				/* Si le numero est vide OU le numero n'est pas numeric OU si le numero n'est pas de longeur égale à 10 */
				$this->getSession()->setMessage("Le numero de téléphone est incorect");
			}else if($request->getPostData('mdp') != $request->getPostData('confirm') || $request->getPostData('mdp') == ""){
				/* Si les 2 mot de passe ne sont pas égale OU si le mot de passe et vide */
				$this->getSession()->setMessage("Les mots de passe ne coresponde pas");
			}else{
				/* Sinon c'est que tout est bon */
				$this->getSession()->setMessage("Vous êtes maintenant inscrit !", "valid");
				$this->getDBInstance("Users")->add($this->request->getPost()); // On crée l'utilisateur
				header('Location: '.ROOT_RELATIVE); // On le redirige
				exit();
			}
		}
		/* Affichage de la page */
		return $this->render("User/inscription", array('form' => new Form($request->getPost())));
	}

	public function connectAction(){
		/* Titre de la page */
		$this->getTemplate()->set("titre", 'Espace membres : Connexion');

		/* Si l'utilisateur est connectée */
		if($this->getSession()->is_connect()){
			$this->disconnectUser(); // On le déconnecte
		}

		/* Si le formulaire est remplie */
		if(!empty($_POST)){
			/* On tente de connecté l'utilisateur */
			if($this->connectUser($_POST['email'], $_POST['mdp'])){
				$route = (isset($_GET["before"])?'?page='.$_GET["before"]:''); // Si il vient d'unne autre page un va le renvoyée dessus
				header('Location: '.ROOT_RELATIVE); // Si connecté on le redirige
				exit();
			}
		}

		/* Affichage de la page */
		return $this->render("User/connect", array('form' => new Form($_POST)));
	}

	public function adminAction(){
		if(!$this->getSession()->is_Admin()){
			$this->getSession()->setMessage("Veuillez vous connecté pour accedée à cette page", 'attention'); // on affiche l'erreur
			header('Location: '.ROOT_RELATIVE.'/user/connect'); // On le redirige vers la connection
			exit();
		}

		$users = $this->getDBInstance("Users")->findAll();

		/* Affichage de la page */
		return $this->render("User/admin", array('users' => $users));

	}
}