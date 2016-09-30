<?php
	
	namespace Html;

	class balise_content {

		/**
		 * @var string correspond à la balise qui entourera l'élément ciblé
		 */
		public $surround = 'p';
		/**
		 * @var string correspond à l'attribut name d'une balise
		 */
		protected $attr_name = ' name';
		/**
		 * @var string correspond à l'attribut id d'une balise
		 */
		protected $attr_id = ' id';
		/**
		 * @var string correspond à l'attribut value d'une balise
		 */
		protected $attr_value = ' value';
		/**
		 * @var string correspond à l'attribut type d'une balise
		 */
		protected $attr_type = ' type';
		/**
		 * @var string correspond à l'attribut class d'une balise
		 */
		protected $attr_class = ' class';

		public function __construct() {}

		/**
		 * @param $html string code html à entourer
		 * @return string
		 */
		protected function surround($html){
			return "<{$this->surround}>{$html}</{$this->surround}>";
		}
		/**
		 * @param $value string ajout de l'attribut name s'il y a une valeur existante
		 * @return null|string
		 */
		protected function addName($value){
			return isset($value) ? $this->attr_name . '="' . $value . '" ' : null;
		}
		/**
		 * @param $value string ajout de l'attribut id s'il y a une valeur existante
		 * @return null|string
		 */
		protected function addId($value){
			return isset($value) ? $this->attr_id . '="' . $value . '" ' : null;
		}
		/**
		 * @param $value string ajout de l'attribut value s'il y a une valeur existante
		 * @return null|string
		 */
		protected function addValue($value){
			return isset($value) ? $this->attr_value . '="' . $value . '" ' : null;
		}
		/**
		 * @param $value string ajout de l'attribut type s'il y a une valeur existante
		 * @return null|string
		 */
		protected function addType($value){
			return isset($value) ? $this->attr_type . '="' . $value . '" ' : null;
		}
		/**
		 * @param $value string ajout de l'attribut class s'il y a une valeur existante
		 * @return null|string
		 */
		protected function addClass($value){
			return isset($value) ? $this->attr_class . '="' . $value . '" ' : null;
		}







	}