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
	public function create($action = "#", $method = "post"){
		return '<form action="'.$action.'" method="'.$method.'">';
	}

	public function input($name, $options = array()){
		if(isset($this->data[$name])){
			$options['value'] = $this->data[$name];
		}
		return '<input name="'.$name.'" '.$this->getOptions($options).'>';
	}

	public function textarea($name){
		return '<textarea name="'.$name.'">'.(isset($this->data[$name])?$this->data[$name]:"").'</textarea>';
	}
	public function select($name, $valeur, $options = array()){
		$data = (isset($this->data[$name])?$this->data[$name]:null);
		$select = '<select name="'.$name.'" '.$this->getOptions($options).'>';
		if(!is_array(current($valeur))){
			$select .= $this->option($valeur, $data);
		}else{
			foreach($valeur as $k => $v){
				$select .= '<optgroup label="'.$k.'">'.$this->option($v, $data, true).'</optgroup>';
			}
		}
		$select .= '</select>';
		return $select;
	}

	private function option($option, $data, $optgroup = false){
		$return = "";
		if(is_object($option[0])){
			foreach($option as $k => $v){
				$option = $v->formOption($optgroup);
				$return .= '<option value="'.$option['value'].'"'.(($data === $option['value'])?"selected=selected":"").'>'.$option['name'].'</option>';
			}
		}else{
			foreach($option as $k => $v){
				$return .= '<option value="'.$k.'"'.(($data === $k)?"selected=selected":"").'>'.$v.'</option>';
			}
		}
		return $return;
	}
	/**
	 * @return string
	 **/
	public function close(){
		return '</form>';
	}

	/**
	 * @param Array $options
	 * @return string
	 */
	private function getOptions($options)
	{
		$option = "";
		foreach($options as $k => $v){
			$option .= $k.'="'.$v.'" ';
		}
		return $option;
	}

	public function checkbox($name, $value, $options = array())
	{
		if(isset($this->data[$name])){
			$options['checked'] = "checked";
		}
		return '<input name="'.$name.'" type="checkbox" '.$this->getOptions($options).'> '.$value;
	}
}