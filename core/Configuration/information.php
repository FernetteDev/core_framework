<?php
namespace Configuration;
/**
 * Classe regroupant toutes les informations du site
 * @author Fernette Développement
 */
class information {
    
    /**
    * Chemin racine du site.
    */
    const CHEMIN_RACINE = "C:/wamp/www/framework/";
    const AUTOLOAD_EXT = ".php";
    /**
    * Base de données.
    */
    const BDD_BASE = "test_core";
    const BDD_USER = "root";
    const BDD_PASS = "";
    const BDD_HOTE = "localhost";
    const BDD_PORT = 3306;

    /**
     * Clef de cryptage des sessions pour plus de sécurité il est judicieux de crypter la clé en md5() ou sha1();
     */
    const CLEF_CRYPTAGE = '';
}
