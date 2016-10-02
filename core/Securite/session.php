<?php

namespace Securite;
use Configuration\information;

class Session {
    
    public function __construct() {
        session_start();
    }
    public function creation($pTabResultat) {
        $_SESSION['securite'] = $this->crypter(serialize($pTabResultat));
    }
    public function valide() {
        if (!isset($_SESSION['securite'])) {
            header('Location: index.php');
        } else {
            $aSessionDecrypte = unserialize($this->decrypter($_SESSION['securite']));
            if ($aSessionDecrypte['code'] != 'ok') {
                header('Location: index.php');
                die();
            }
        }
    }
    
    /**
     * Méthode de cryptage.
     * @param string $pStrTexte Texte en claire
     * @return string Texte crypté.
     */
    public function crypter($pStrTexte) {
        return mcrypt_encrypt(MCRYPT_RIJNDAEL_256, information::CLEF_CRYPTAGE, $pStrTexte, MCRYPT_MODE_ECB);
    }
    /**
     * Méthode de décryptage :
     * @param string $pStrTexte Texte crypté.
     * @return string Texte Texte en clair.
     */
    public function decrypter($pStrTexte) {
        return rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, information::CLEF_CRYPTAGE, $pStrTexte, MCRYPT_MODE_ECB), "\0");
    }
}
