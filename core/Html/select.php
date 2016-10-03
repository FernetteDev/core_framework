<?php
	
	namespace Html;
	
	class select extends balise_content {
	
		private $options;
		
		public function __construct() {}
		
		/**
		 * @param array $id prend en paramètre les id des options 
		 * @param array $valeur prend en paramètre les valeurs des options
		 * ATTENTION -> bien faire en sorte que le nombre d'id soit bien égal au nombre de valeur
		 * @return mixed
		 */
		public function addOption($id=array(), $valeur=array()) {
			if(count($id) == count($valeur)){
				for($i=0; $i < count($id); $i++){
					$this->options[$i] = '<option id="' . $id[$i] . '">' . $valeur[$i] . '</option>';
				}
			}
			return $this->options;
		}
		
		/**
		 * @param null $id prend en paramètre l'id du select
		 * @param null $class prend en paramètre la class du select
		 */
		public function createSelect($id=null, $class=null) {
			echo '<select' . $this->addId($id) . $this->addClass($class) . '>';
			for($i=0; $i < count($this->options); $i++){
				echo $this->options[$i];
			}
			echo '</select>';
		}
	
		
	}