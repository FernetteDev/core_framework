<?php
	
	namespace Html;

	class balise extends balise_content {

		function __construct(){}

		/**
		 * @param $type_balise string Choix de la balise
		 * @param $content string Contenu de la balise
		 * @param $id string id de la balise
		 * @param $class string classe de la balise
		 * @param $name string name de la balise
		 * @return string
		 */
		public function balise($type_balise, $content='', $id=null, $class=null, $name=null){
			echo '<' . $type_balise . ' ' . $this->addId($id) . $this->addClass($class) . $this->addName($name) . '>' . $content . '</' . $type_balise . '>';
		}
		
		/**
		 * @param      $source
		 * @param      $alt
		 * @param null $id
		 * @param null $class
		 * @param null $name
		 *
		 * @return string
		 */
		public function img($source, $alt, $id=null, $class=null, $name=null){
			echo '<img src="' . $source . '" alt="' . $alt . '" ' . $this->addId($id) . $this->addClass($class) . $this->addName($name) .'>';
		}
		
		/**
		 * @param        $content
		 * @param string $href
		 * @param null   $id
		 * @param null   $class
		 * @param null   $name
		 *
		 * @return string
		 */
		public function a($content, $href='#', $id=null, $class=null, $name=null){
			echo '<a href=' . $href . ' ' . $this->addId($id) . $this->addClass($class) . $this->addName($name) . '>' . $content . '</a>';
		}
		
		function __destruct(){}

	}