$(document).ready(function () {
    
    /**
     * Gestion du menu de navigation
     */
    function Navigation(arg) {
        var pages = $(arg + ' article');
        pages.hide().filter(':first').show();
        $(arg + ' nav a').click(function () {
            pages.hide();
            pages.filter(this.hash).show();
            $(arg + ' nav a').removeClass('selected');
            $(this).addClass('selected');
            return false;
        });
        // arg : Sélection de la page par la classe de la section
    }
    
    /**
     * Permet de gérer le suivi de navigation en php
     */
    function url_influence(arg) {
        $(arg).hover(function () {
            // récupération de l'Url
            var UrlGlobal = (window.location).href;
            // lastIndexOf récupère le nombre de caractère de la chaîne de UrlGlobal avant le '='
            // substring () +1 extrait la valeur après l'espace du '='
            // récupération de la valeur de l'Url à associer à la valeur du menu pour l'application du changement du css
            var IdPourVerif = UrlGlobal.substring(UrlGlobal.lastIndexOf('=') + 1);
            // récupération du contenu du href
            var list_href = $(this).attr('href');
            // récupération de la valeur de l'id du href
            var hrefVerif = list_href.substring(list_href.lastIndexOf('=') + 1);
            // application de la class "selected" si les deux valeurs sont identiques
            if (hrefVerif === IdPourVerif) {
                $(this).addClass('selected');
            }
        });
    }
    
    /**
     * Gestion des informations de validation des champs de texte
     */
    function form_validation(arg) {
        $(arg).focus(function () {
            $(this).css('background-color', 'yellow');
            $(this).next().remove('span');
        }).blur(function () {
            $(this).css('background', 'none');
            var createSpanTrue = '<span>*Validé</span>'
            var createSpanFalse = '<span>*Ce champs est obligatoire</span>';
            if ($(this).val() === "") {
                $(createSpanFalse).insertAfter($(this)).css({
                    color: 'darkRed'
                    , backgroundColor: 'aliceBlue'
                    , borderRadius: '3px'
                });
                return false;
            } else {
                $(createSpanTrue).insertAfter($(this)).css({
                    color: 'darkGreen'
                    , backgroundColor: 'aliceBlue'
                    , borderRadius: '3px'
                });
                return true;
            }
        });
    }

}); // fin de ready.