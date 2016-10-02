<?php

	namespace Html;
	
	/**
	 * Class Form
	 * permet de générer un formulaire rapidement et simplement
	 */
	class form extends balise_content {

		/**
		 * @var array données utilisé par le formulaire
		 */
		protected $data;
		/**
		 * Form constructor.
		 * @param array $data
		 */
		public function __construct($data = array()) {
			$this->data = $data;
		}
		
		/**
		 * @param $index string cherche la value pour un input
		 * @return string $this->getValue($...) prend en paramètre le name de l'input ciblé
		 */
		protected function getValue($index){
			return isset($this->data[$index]) ? $this->data[$index] : null;
		}

		/**
		 * @param string $action
		 * @param string $method
		 * @return string
		 */
		public function form($action='#', $method='post'){
			echo '<form action="' . $action . '" method="' . $method . '">';
		}

		/**
		 * @param $name string défini le name de l'élément
		 * @param $type string défini le type de l'élément
		 * @param $id string défini l'id de l'élément
		 * @param $class string défini la ou les class de l'élément
		 * @return string ici getValue permet une persistance des données après envoie du post
		 */
		public function input($name, $id=null, $class=null, $type="text"){
			echo $this->surround('<input' . $this->addName($name). $this->addClass($class) . $this->addId($id) . $this->addType($type) .
			$this->addValue($this->getValue($name)) . '>');
		}

		/**
		 * @param $text string texte du boutton
		 * @param $name string name du submit
		 * @param $id string
		 * @param $type string
		 * @return string
		 */
		public function button($text, $name=null, $id=null, $type='submit'){
			echo $this->surround('<button' . $this->addType($type) . $this->addId($id) . $this->addValue($name) . '>' . $text . '</button>');
		}

		/**
		 * @return string
		 */
		public function endForm() {
			echo '</form>';
		}
		
	}