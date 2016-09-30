<?php
    
    namespace Image;
    
    class crea_image {
        
        /**
         * Classe permettant de créer une image réduite.
         * @param string $strCheminOrigineImage
         * @param string $strCheminDestinationImage
         * @param integer $intLargeurMaximum largeur maximum souhaité de l'image
         * @param integer $intHauteurMaximum hauteur maximum souhaité de l'image
         * @param integer $intQualiteJpeg
         * @param boolean $blnSuppressionImageOrigine
         */
        public static function CreaImage($strCheminOrigineImage, $strCheminDestinationImage, $intLargeurMaximum, $intHauteurMaximum, $intQualiteJpeg = 90, $blnSuppressionImageOrigine = false) {
            // On récupère les informations de taille du fichier afin de redimensionner l'image si nécessaire :
            $aTaille = getimagesize($strCheminOrigineImage);
            $intLargeur = $aTaille[0];
            $intHauteur = $aTaille[1];
            // Récupération de l'extension du fichier d'origine :
            $strExtensionImageOrigine = strtolower(strrchr($strCheminOrigineImage, '.'));
            // Récupération de l'extension du fichier de destination :
            $strExtensionImageDestination = strtolower(strrchr($strCheminDestinationImage, '.'));
            // On créer une copie en mémoire de l'image proposée par l'internaute :
            switch ($strExtensionImageOrigine) {
                // case ".gif": $bmpImageOrigine = imagecreatefromgif($strCheminOrigineImage); break;
                case ".jpg": $bmpImageOrigine = imagecreatefromjpeg($strCheminOrigineImage);
                    break;
                case ".jpeg": $bmpImageOrigine = imagecreatefromjpeg($strCheminOrigineImage);
                    break;
                case ".png": $bmpImageOrigine = imagecreatefrompng($strCheminOrigineImage);
                    break;
            }
            // On test si l'image proposée n'est pas trop grande, sinon on calcule le pourcentage de redimensionnement :
            $intPourcentageLargeur = 0;
            $intPourcentageHauteur = 0;
            if ($intLargeur > $intLargeurMaximum || $intHauteur > $intHauteurMaximum) {
                // Calcul du pourcentage de largeur :
                if ($intLargeur > $intLargeurMaximum) {
                    $intPourcentageLargeur = $intLargeur / $intLargeurMaximum;
                }
                // Calcul du pourcentage de hauteur :
                if ($intHauteur > $intHauteurMaximum) {
                    $intPourcentageHauteur = $intHauteur / $intHauteurMaximum;
                }
                // On garde le pourcentage le plus grand :
                if ($intPourcentageLargeur < $intPourcentageHauteur) {
                    $intPourcentage = $intPourcentageHauteur;
                } else {
                    $intPourcentage = $intPourcentageLargeur;
                }
            } else {
                $intPourcentage = 1;
            }
            $intNouvelleLargeur = round($intLargeur / $intPourcentage);
            $intNouvelleHauteur = round($intHauteur / $intPourcentage);
            // On redimensionne l'image :
            $bmpImageDestination = imagecreatetruecolor($intNouvelleLargeur, $intNouvelleHauteur);
            
            imagecopyresampled($bmpImageDestination, $bmpImageOrigine, 0, 0, 0, 0, $intNouvelleLargeur, $intNouvelleHauteur, $intLargeur, $intHauteur);
            // On supprime l'ancienne image si le paramètre "$blnSuppressionImageOrigine" est à "true" :
            if ($blnSuppressionImageOrigine) {
                if (file_exists($strCheminOrigineImage)) {
                    unlink($strCheminOrigineImage);
                }
            }
            // On enregistre l'image:
            switch ($strExtensionImageDestination) {
                case ".gif": imagegif($bmpImageDestination, $strCheminDestinationImage);
                    break;
                case ".jpg": imagejpeg($bmpImageDestination, $strCheminDestinationImage, $intQualiteJpeg);
                    break;
                case ".jpeg": imagejpeg($bmpImageDestination, $strCheminDestinationImage, $intQualiteJpeg);
                    break;
                case ".png": imagepng($bmpImageDestination, $strCheminDestinationImage);
                    break;
            }
        }
        
    }