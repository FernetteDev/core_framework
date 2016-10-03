<?php

namespace Securite;
use Configuration\information;

class Session {
    
    public function __construct() {
        session_start();
    }
    //public function creation($pTabResultat) {
    //    $_SESSION['securite'] = $this->crypter(serialize($pTabResultat));
    //}
    //public function valide() {
    //    if (!isset($_SESSION['securite'])) {
    //        header('Location: index.php');
    //    } else {
    //        $aSessionDecrypte = unserialize($this->decrypter($_SESSION['securite']));
    //        if ($aSessionDecrypte['code'] != 'ok') {
    //            header('Location: index.php');
    //            die();
    //        }
    //    }
    //}




    /**
     * Méthode de cryptage
     * Paramètre de mcrypt_encrypt() :
     *     - 1 / Choix de l'algorithm -> mcrypt_list_algorithms()
     *     - 2 / clé de cryptage -> il est important pour plus de sécurité de crypter la clé de cryptage par md5('choix de la clé')
     *                              ou sha1('choix de la clé') et de placer le résultat dans le fichier de configuration du site
     *     - 3 / Mon mot de passe -> variable $pStrTexte
     *     - 4 / Choix du mode de cryptage -> mcrypt_list_modes()
     * @param string $pStrTexte Texte en claire
     * @return string Texte crypté.
     */
    public function crypter($pStrTexte) {
        return mcrypt_encrypt(MCRYPT_RIJNDAEL_256, information::CLEF_CRYPTAGE, $pStrTexte, MCRYPT_MODE_ECB);
    }
    /**
     * Méthode de décryptage
     * Il est important de saisir les mêmes choix d'algorithm et de mode de cryptage pour que le retour du mot de passe correspondent
     * @param string $pStrTexte Texte crypté.
     * @return string Texte Texte en clair.
     */
    public function decrypter($pStrTexte) {
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, information::CLEF_CRYPTAGE, $pStrTexte, MCRYPT_MODE_ECB), "\0");
    }
}
