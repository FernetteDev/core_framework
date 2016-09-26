<?php

    namespace Structure;
    use Configuration\information;

    class structure  {

        /**
         * @var string Variable contenant le footer de la page.
         */
        private $strPied;

        /**
         * Constructeur permettant de charger l'entête du document.
         * Passage de l'entête pour positionnement en haut du document par défaut.
         * @param string $pStrEntete Le nom du fichier faisant référence à l'entête.
         */
        public function __construct($pStrEntete = "head_html.php") {
            $this->footer();
            include(information::CHEMIN_RACINE . 'inc/MiseEnPage/' . $pStrEntete);
        }

        /**
         * @param string $pStrPied Le nom du fichier faisant référence au pied de page.
         */
        public function footer($pStrPied = "end_html.php"){
            $this->strPied = $pStrPied;
        }

        /**
         * Passage du footer pour positionnement en bas du document par défaut
         */
        public function __destruct() {
            include(information::CHEMIN_RACINE . 'inc/MiseEnPage/' . $this->strPied);
        }

    }