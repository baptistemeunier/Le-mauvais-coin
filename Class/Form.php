<?php

/**
 * Classe Form
 * Gestion des formulaires (Affichage)
 **/
class Form
{

	private $data;

	function __construct($data = array()){
		$this->data = $data;
	}

	/**
	 * @param $action
	 * @param string $method
	 * @return string
	 **/
	public function create($action, $method = "post"){
		return '<form action="'.$action.'" method="'.$method.'">';
	}

	public function input($name, $options = array()){
		$option = "";
		if(isset($this->data[$name])){
			$options['value'] = $this->data[$name];
		}
		foreach($options as $k => $v){
			$option .= $k.'='.$v.' ';
		}
		return '<input name="'.$name.'" '.$option.'>';
	}

	public function textarea($name){
		return '<textarea name="'.$name.'">'.(isset($this->data[$name])?$this->data[$name]:"").'</textarea>';
	}
	public function select($name, $valeur){
		$data = (isset($this->data[$name])?$this->data[$name]:null);
		$select = '<select name="'.$name.'">';
		if(is_object($valeur[0])){
			foreach($valeur as $k => $v){
				$option = $v->formOption();
				$select .= '<option value="'.$option['value'].'"'.(($data === $option['value'])?"selected=selected":"").'>'.$option['name'].'</option>';
			}
		}else{
			foreach($valeur as $k => $v){
				$select .= '<option value="'.$k.'"'.(($data === $k)?"selected=selected":"").'>'.$v.'</option>';
			}
		}

		$select .= '</select>';
		return $select;
	}

	/**
	 * @return string
	 **/
	public function close(){
		return '</form>';
	}
}