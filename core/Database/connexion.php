<?php
    namespace Database;
    use Configuration\information;
    use \PDO;
    
    class connexion {
        /**
         * future instance de la Classe PDO
         * @var \PDO
         */
        
        private $db_base;
        private $db_user;
        private $db_port;
        private $db_hote;
        private $db_pass;
        private $oPDO = null;
        
        /**
         * Connexion à la base de données
         */
        public function __construct($db_base = information::BDD_BASE,$db_user = information::BDD_USER,$db_port = information::BDD_PORT,$db_hote = information::BDD_HOTE,$db_pass = information::BDD_PASS) {
            $this->db_base=$db_base;
            $this->db_user=$db_user;
            $this->db_port=$db_port;
            $this->db_hote=$db_hote;
            $this->db_pass=$db_pass;
            
        }
        
        protected function getPDO(){
            if($this->oPDO === null){
                $pdo = new PDO('mysql:dbname=' . information::BDD_BASE . ';host=' . information::BDD_HOTE . ';charset=' . information::BBD_CHARSET . ';port=' . information::BDD_PORT, information::BDD_USER, information::BDD_PASS);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->oPDO = $pdo;
            }
            return $this->oPDO;
        }
        
        /**
         * Déconnexion de la base de données
         */
        public function __destruct() {
            $this->oPDO = null;
        }
    }