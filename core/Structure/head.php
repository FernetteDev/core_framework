<?php

	namespace Structure;

	class head {
		/**
		 * @var string Choix de la langue.
		 */
		public $langue_html = 'fr';
		/**
		 * @var string variable contenant le titre de l'onglet de la page.
		 */
		private $strTitre;
		/**
		 * @var string variable contenant le charset
		 */
		private $strCharset;
		/**
		 * @var string variable indiquant si ou non on veut être suivi par les robots google
		 */
		private $strRobot;
		/**
		 * @var string variable contenant la description de la meta pour google
		 */
		private $strDescription;
		/**
		 * @var string variable contient la viewport
		 */
		private $strViewport;
		/**
		 * @var string variable contenant le css.
		 */
		private $strCss;
		/**
		 * @var string variable contenant des scripts facultatif
		 */
		private $strScript;


		/**
		 * head constructor.
		 */
		public function __construct() {
			return
				'<!doctype:html>
				<html lang=' . $this->langue_html . '>
				<head>' .
					$this->strTitre .
					$this->strRobot .
					$this->strCharset .
					$this->strViewport .
					$this->strDescription .
					$this->strCss .
				'</head>';
		}

		/**
		 * @param string $pStrTitre Le title du document.
		 * @return string
		 */
		public function titre($pStrTitre = "nouvelle page") {
			echo $this->strTitre = '<title>' . $pStrTitre . '</title>';
		}
		
		/**
		 * @param string $pStrIndex  par défaut est désigné comme indexé par les robots google.
		 * @param string $pStrFollow par défaut est désigné comme follow par les robots google.
		 * @return string
		 */
		public function robot($pStrIndex = 'index', $pStrFollow = 'follow') {
			echo $this->strRobot = '<meta name="robot" content=' . $pStrIndex . ',' . $pStrFollow . '/>';
		}

		/**
		 * @param string $pStrViewport désigne le viewport du document
		 * @return null|string
		 */
		public function viewport($pStrViewport = 'width=device-width'){
			echo isset($pStrViewport) ? $this->strViewport = '<meta name="viewport" content="' . $pStrViewport . '"/>' : null;
		}
		
		/**
		 * @param string $pStrCharset permet de choisir le l'encodage du charset.
		 * @return string
		 */
		public function charset($pStrCharset = 'UTF-8'){
			echo $this->strCharset = '<meta charset="' . $pStrCharset . '"/>';
		}

		/**
		 * @param string $pStrDescription contient la description de la meta pour google
		 * @return string
		 */
		public function description($pStrDescription = null) {
			echo isset($pStrDescription) ? $this->strDescription = '<meta name="description" content="' . $pStrDescription . '"/>' : null;
		}
		
		/**
		 * @param string $pStrCss nom du fichier Css à intégrer au document (sans le .css).
		 * @return string
		 */
		public function css($pStrCss = array()) {
			if(isset($pStrCss)){
				for($i = 0; $i < count($pStrCss); $i++){
					echo $this->strCss[$i] = '<link href="inc/css/' . $pStrCss[$i] . '.css" rel="stylesheet"/>';
				}
			}
		}
		
		/**
		 * @param string $pStrScript Script à intégrer au document.
		 * @return string
		 */
		public function script($pStrScript) {
			echo isset($pStrScript) ? $this->strScript = $pStrScript : null;
		}

		/**
		 * Passage du footer pour positionnement en bas du document par défaut
		 */
		public function __destruct() {
			return
			$this->strScript .
			'</html>';
		}



	}