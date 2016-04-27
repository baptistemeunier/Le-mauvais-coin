<?php

class ExectutionException extends Exception{
	public $debug;
	public $controller;
}

class NotFoundException extends ExectutionException{

}

class InternalErrorException extends ExectutionException{

}

