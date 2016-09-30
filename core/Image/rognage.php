<?php

    namespace Image;

    class rognage {

        /**
         * Classe permettant de rogner les images.
         * @param string  $strCheminImageOrigine Image d'origine (non conservé par défaut)
         * @param string  $strCheminNewImageRogne Nouvelle image rogné.
         * @param integer $intLargeurImageRogne Largeur de l'image rogné souhaité.
         * @param integer $intHauteurImageRogne Hauteur de l'image rogné souhaité.
         * @param integer $intQualiteJpeg La valeur par défaut est au maximum = 100.
         * @param boolean $blnSuppressionImageOrigine Si la variable est à 'false' on conserve l'image d'origine, par défaut elle est à true.
         */

        public static function creaRognage($strCheminImageOrigine, $strCheminNewImageRogne, $intLargeurImageRogne, $intHauteurImageRogne, $intQualiteJpeg = 100, $blnSuppressionImageOrigine = true) {

            #################################
            # Création de l'image d'origine #
            #################################

            // Récupération de l'extension du fichier d'origine :
            $strExtensionImageOrigine = strtolower(strrchr($strCheminImageOrigine, '.'));
            switch ($strExtensionImageOrigine) {
                case ".jpg": $bmpImageOrigine = imagecreatefromjpeg($strCheminImageOrigine);
                    break;
                case ".jpeg": $bmpImageOrigine = imagecreatefromjpeg($strCheminImageOrigine);
                    break;
                case ".png": $bmpImageOrigine = imagecreatefrompng($strCheminImageOrigine);
                    break;
            }

            ##################################################
            # Récupération de la taille de l'image d'origine #
            ##################################################

            // récupération des valeurs du rognage
            $x = $_POST["x"]; $y = $_POST["y"]; // Point de référence 'x' et 'y'.
            $w = $_POST["w"]; $h = $_POST["h"]; // Largeur et Hauteur.

            ######################
            # Rognage de l'image #
            ######################

            $aRognage = array ('x'=>$x, 'y'=>$y, 'width'=>$w, 'height'=>$h);

            #################################
            # Création de la nouvelle image #
            #################################

            $bmpImageRogne = imagecrop($bmpImageOrigine, $aRognage);

            // On récupère les informations de taille du fichier afin de redimensionner l'image si nécessaire :

            $intPourcentageLargeur = 0;
            $intPourcentageHauteur = 0;
            
            if ($w > $intLargeurImageRogne || $h > $intHauteurImageRogne) {
                // Calcul du pourcentage de largeur :
                if ($w > $intLargeurImageRogne) {
                    $intPourcentageLargeur = $w / $intLargeurImageRogne;
                }
                // Calcul du pourcentage de hauteur :
                if ($h > $intHauteurImageRogne) {
                    $intPourcentageHauteur = $h / $intHauteurImageRogne;
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
            $intNouvelleLargeur = round($w / $intPourcentage);
            $intNouvelleHauteur = round($h / $intPourcentage);
            
            // On redimensionne l'image :
            $newImageRogne = imagecreatetruecolor($intNouvelleLargeur, $intNouvelleHauteur);

            imagecopyresampled($newImageRogne, $bmpImageRogne, 0, 0, 0, 0, $intNouvelleLargeur, $intNouvelleHauteur, $w, $h);

            $strExtensionNewImageRogne = strtolower(strrchr($strCheminImageOrigine, '.'));
            // On enregistre l'image:
            switch ($strExtensionNewImageRogne) {
                case ".gif": imagegif($newImageRogne, $strCheminNewImageRogne);
                    break;
                case ".jpg": imagejpeg($newImageRogne, $strCheminNewImageRogne, $intQualiteJpeg);
                    break;
                case ".jpeg": imagejpeg($newImageRogne, $strCheminNewImageRogne, $intQualiteJpeg);
                    break;
                case ".png": imagepng($newImageRogne, $strCheminNewImageRogne);
                    break;
            }

            ####################################
            # Suppression de l'image d'origine #
            ####################################

            // On supprime l'ancienne image si le paramètre "$blnSuppressionImageOrigine" est à "true" :
            if ($blnSuppressionImageOrigine) {
                if (file_exists($strCheminImageOrigine)) {
                    unlink($strCheminImageOrigine);
                }
            }
        }
    }