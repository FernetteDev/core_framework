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
		 * @var string variable contenant les fichiers css.
		 */
		private $strCss;
		/**
		 * @var string variable contenant l'intégration des fichiers scripts facultatif
		 */
		private $strScript;
		/**
		 * @var string variable contenant le JavaScript/Jquery
		 * écrit habituellement dans la page html.
		 */
		private $strJavaScript;


		/**
		 * head constructor.
		 */
		public function __construct() {
			return
				'<!doctype:html>
				<html lang=' . $this->langue_html . '>
				<head>' .
				$this->robot() .
				$this->charset() .
				$this->viewport() .
				$this->description() .
				'</head>
				<body>';
		}
		/**
		 * Passage du footer pour positionnement en bas du document par défaut
		 */
		public function __destruct() {
			return
			$this->strScript .
			'</body>
				</html>';
		}

		/**
		 * @param string $pStrTitre Le title du document.
		 */
		public function titre($pStrTitre = "nouvelle page") {
			echo $this->strTitre = '<title>' . $pStrTitre . '</title>';
		}
		/**
		 * @param string $pStrIndex  par défaut est désigné comme indexé par les robots google.
		 * @param string $pStrFollow par défaut est désigné comme follow par les robots google.
		 */
		public function robot($pStrIndex = 'index', $pStrFollow = 'follow') {
			echo $this->strRobot = '<meta name="robot" content=' . $pStrIndex . ',' . $pStrFollow . '/>';
		}
		/**
		 * @param string $pStrViewport désigne le viewport du document
		 */
		public function viewport($pStrViewport = null){
			echo isset($pStrViewport) ? $this->strViewport = '<meta name="viewport" content="' . $pStrViewport . '"/>' : null;
		}
		/**
		 * @param string $pStrCharset permet de choisir le l'encodage du charset.
		 */
		public function charset($pStrCharset = 'UTF-8'){
			echo $this->strCharset = '<meta charset="' . $pStrCharset . '"/>';
		}
		/**
		 * @param string $pStrDescription contient la description de la meta pour google
		 */
		public function description($pStrDescription = null) {
			echo isset($pStrDescription) ? $this->strDescription = '<meta name="description" content="' . $pStrDescription . '"/>' : null;
		}
		
		/**
		 * @param array $pStrCss nom du fichier Css à intégrer au document (sans le .css).
		 */
		public function css($pStrCss = array()) {
			if(isset($pStrCss)){
				for($i = 0; $i < count($pStrCss); $i++){
					echo $this->strCss[$i] = '<link href="inc/css/' . $pStrCss[$i] . '.css" rel="stylesheet"/>';
				}
			}
		}
		/**
		 * @param array $pStrScript fonction incluant les scripts.
		 */
		public function script($pStrScript = array()) {
			if(isset($pStrScript)){
				for($i = 0; $i < count($pStrScript); $i++){
					echo $this->strJavaScript[$i] = '<script src="inc/js/' . $pStrScript[$i] . '.js"></script>';
				}
			}
		}
		/**
		 * @param $pStrJavascript string fonction permettant
		 * d'inscrire le script d'execution de la page
		 */
		public function javascript($pStrJavascript) {
			echo isset($pStrJavascript) ? $this->strScript = '<script>' . $pStrJavascript . '</script>' : null;
		}

	}