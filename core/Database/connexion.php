<?php
    namespace Database;
    use Configuration\information;
    use PDO;

    class connexion {
        /**
         * future instance de la Classe PDO
         * @var \PDO
         */
        public $oPDO = null;
        
        /**
         * Connexion à la base de données
         */
        public function __construct() {
            if($this->oPDO == null){
                $this->oPDO = new PDO('mysql:dbname=' . information::BDD_BASE . ';host=' . information::BDD_HOTE . ';charset=UTF8;port=' . information::BDD_PORT, information::BDD_USER, information::BDD_PASS);
                $this->oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } else {
                $this->oPDO = new PDO('mysql:dbname=' . information::BDD_BASE . ';host=' . information::BDD_HOTE . ';charset=UTF8;port=' . information::BDD_PORT, information::BDD_USER, information::BDD_PASS);
            }
        }
        
        /**
         * Déconnexion de la base de données
         */
        public function __destruct() {
            $this->oPDO = null;
        }
    }