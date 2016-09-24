<?php

namespace Html;
use Configuration\information;

class structure  {
    
    /**
     * @var string variable contenant le titre de l'onglet de la page.
     */
    private $strTitre;
    /**
     * @var string variable indiquant si ou non on veut être suivi par les robots google
     */
    private $strRobot;
    /**
     * @var string variable contenant la description de la meta pour google
     */
    private $strDescription;
    /**
     * @var string variable contenant le css.
     */
    private $strCss;
    /**
     * @var string variable contenant des scripts facultatif
     */
    private $strScript;
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
        //$this->strHead = $pStrEntete;
        include(information::CHEMIN_RACINE . 'inc/MiseEnPage/' . $pStrEntete);
        $this->titre();
        $this->strTitre;

        $this->robot();
        $this->footer();
        $this->description();
    }
    
    /**
     * @param string $pStrTitre Le title du document.
     */
    public function titre( $pStrTitre = "nouvelle page"){
        $this->strTitre = $pStrTitre;
    }

    /**
     * @param string $pStrIndex par défaut est désigné comme indexé par les robots google.
     * @param string $pStrFollow par défaut est désigné comme follow par les robots google.
     */
    public function robot($pStrIndex = 'index', $pStrFollow = 'follow'){
        $this->strRobot = $pStrIndex . ', ' . $pStrFollow ;
    }

    /**
     * @param string $pStrDescription contient la description de la meta pour google
     */
    public function description($pStrDescription = ''){
        $this->strDescription = $pStrDescription;
    }
    
    /**
     * @param string $pStrCss nom du fichier Css à intégrer au document (sans le .css).
     */
    public function css($pStrCss = ''){
        $this->strCss = '<link href="inc/css/' . $pStrCss . '.css" rel="stylesheet" />';
    }

    /**
     * @param string $pStrPied Le nom du fichier faisant référence au pied de page.
     */
    public function footer($pStrPied = "end_html.php"){
        $this->strPied = $pStrPied;
    }
    
    /**
     * @param string $pStrScript Script à intégrer au document.
     */
    public function script($pStrScript = ""){
        $this->strScript = $pStrScript;
    }
    
    /**
     * Passage du footer pour positionnement en bas du document par défaut
     */
    public function __destruct() {
        include(information::CHEMIN_RACINE . 'inc/MiseEnPage/' . $this->strPied);
    }
    
}



