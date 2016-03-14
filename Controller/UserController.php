<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 14/03/16
 * Time: 20:35
 **/
class UserController extends App
{
	public function inscriptionAction(){

		if($this->getSession()->is_connect()){
			header('Location: index.php'); // Si connecté on le redirige
			exit();
		}

		if(!empty($_POST)){
			if($_POST['email'] == "" || preg_match("%^[a-zA-Z0-9.]+@[a-zA-Z]+.[a-z.]+$%", $_POST['email']) == 0){
				$this->getSession()->setMessage("L'email saisie est incorecte");
			}else if($_POST['tel'] != "" && (!is_numeric($_POST['tel']) || strlen($_POST['tel']) != 10)){
				$this->getSession()->setMessage("Le numero de téléphone est incorect");
			}else if($_POST['mdp'] != $_POST['confirm'] || $_POST['mdp'] == ""){
				$this->getSession()->setMessage("Les mots de passe ne coresponde pas");
			}
			$this->getDBInstance()->AddUser($_POST);
		}

		/* Affichage de la page */
		return $this->render("User/inscription", array('form' => new Form($_POST)));
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
				header('Location: index.php'.$route); // Si connecté on le redirige
				exit();
			}
		}

		/* Affichage de la page */
		return $this->render("User/connect", array('form' => new Form($_POST)));
	}

	public function adminAction(){
		if(!$this->getSession()->is_Admin()){
			$this->getSession()->setMessage("Veuillez vous connecté pour accedée à cette page", 'attention'); // on affiche l'erreur
			header('Location: index.php?page=user/connect'); // On le redirige vers la connection
			exit();
		}

		$users = $this->getDBInstance()->findUsers();

		/* Affichage de la page */
		return $this->render("User/admin", array('users' => $users));

	}
}