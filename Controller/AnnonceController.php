<?php

/**
 * Created by PhpStorm.
 * User: baptiste
 * Date: 14/03/16
 * Time: 20:35
 */
class AnnonceController extends App
{
	public function indexAction(){
		return $this->render("createannonce");
	}

	public function createAction(){
		return $this->render("createannonce");
	}
}