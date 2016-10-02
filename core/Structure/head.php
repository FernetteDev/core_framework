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
		private $strTitre = "nouvelle page";
		/**
		 * @var string variable contenant le charset
		 */
		private $strCharset = 'UTF-8';
		/**
		 * @var string variable indiquant si ou non on veut être suivi par les robots google
		 */
		public $strRobot = 'index,follow';
		/**
		 * @var string variable contenant la description de la meta pour google
		 */
		private $strDescription;
		/**
		 * @var string variable contient la viewport
		 */
		private $strViewport = 'width=device-width';
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
		 * @param string $pStrLangue définition de la langue du code html.
		 * @return null|string
		 */
		public function langue($pStrLangue){
			return isset($pStrLangue) ? $this->langue_html = $pStrLangue : null;
		}

		/**
		 * @param string $pStrTitre Le title du document.
		 * @return null|string
		 */
		public function titre($pStrTitre) {
			return isset($pStrTitre) ? $this->strTitre = $pStrTitre : null;
		}

		/**
		 * @param string $pStrRobot
		 * @return null|string
		 */
		public function robot($pStrRobot) {
			return isset($pStrRobot) ? $this->strRobot =  $pStrRobot : null ;
		}

		/**
		 * @param string $pStrViewport désigne le viewport du document
		 * @return null|string
		 */
		public function viewport($pStrViewport){
			return isset($pStrViewport) ? $this->strViewport = $pStrViewport : null;
		}

		/**
		 * @param string $pStrCharset permet de choisir le l'encodage du charset.
		 * @return null|string
		 */
		public function charset($pStrCharset){
			return isset($pStrCharset) ? $this->strCharset = $pStrCharset : null;
		}

		/**
		 * @param string $pStrDescription contient la description de la meta pour google
		 * @return null|string
		 */
		public function description($pStrDescription = null) {
			return isset($pStrDescription) ? $this->strDescription = $pStrDescription : null;
		}

		/**
		 * @param array $pStrCss nom du fichier Css à intégrer au document (sans le .css).
		 * @return null|string
		 */
		public function css($pStrCss = array()) {
			return isset($pStrCss) ? $this->strCss = $pStrCss : null;
		}

		/**
		 * Fonction permettant d'afficher tout les éléments du "head"
		 * Par défaut :
		 * Description -> non remplit
		 * Langue      -> "fr"
		 * Titre       -> "nouvelle page"
		 * Charset     -> "utf-8"
		 * Viewport    -> "width=device-width"
		 * Css         -> non remplit
		 * Robot       -> "index, follow"
		 */
		public function afficher_head(){
			echo '<!doctype html>';
			echo '<html lang="' . $this->langue_html . '">';
			echo '<head>';
			echo '<title>' . $this->strTitre . '</title>';
			echo '<meta charset="' . $this->strCharset . '"/>';
			echo '<meta name="viewport" content="' . $this->strViewport . '"/>';
			echo '<meta name="robot" content="'. $this->strRobot . '">';
			if($this->strDescription != null) {
				echo '<meta name="description" content="' . $this->strDescription . '"/>';
			}
			if(count($this->strCss) != 0){
				for($i = 0; $i < count($this->strCss); $i++){
					echo '<link href="inc/css/' . $this->strCss[$i] . '.css" rel="stylesheet"/>';
				}
			}
			echo '</head>';
			echo '<body>';
		}

		/**
		 * @param array $pStrScript fonction incluant les scripts.
		 * @return null|string
		 */
		public function script($pStrScript = array()) {
			return isset($pStrScript) ? $this->strScript = $pStrScript : null;
		}

		/**
		 * @param $pStrJavascript string fonction permettant
		 *        d'inscrire le script d'execution de la page
		 * @return null|string
		 */
		public function javascript($pStrJavascript) {
			return isset($pStrJavascript) ? $this->strJavaScript = $pStrJavascript : null;
		}

		/**
		 * Le Javascript est appelé dans le destructeur
		 * $this->strScript contient tous les fichiers .js
		 * $this->strJavascript contient le code Javascript écrit sur la page
		 * il est appelé après $this->strScript pour que l'exécution du jquery
		 * puisse être effectué avant.
		 */
		function __destruct() {
			if(count($this->strScript) != 0){
				for($i = 0; $i < count($this->strScript); $i++){
					echo $this->strScript[$i] = '<script src="inc/js/' . $this->strScript[$i] . '.js"></script>';
				}
			}
			if($this->strJavaScript != null){
				echo $this->strJavaScript;
			}
			echo'</body>';
			echo '</html>';
		}
		
	}