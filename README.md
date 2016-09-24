# core_framework

    Namespace Html
        L'objet structure :
            le constructeur prend le fichier head_html.php par défaut.
            le desctructeur prend le fichier end_html.php par défaut.
            'titre' prend le titre de l'onglet du document.
            'robot' par défaut est index, follow pour le suivi des robots google.
            'description' prend la description qui servira pour les robots google et pour le référencement.
            'css' prend juste le nom sans l'extension de fichier.
                    Renouveler autant de fois que de fichier css à inclure.
            'script'prend juste le nom sans l'extension de fichier.
                    Renouveler autant de fois que de fichier javascript à inclure.
                    Attention à l'ordre les fichiers.
                    Les fichiers Javascript sont appelé directement dans le footer donc attention de ne pas inclure de Jquery en plein milieu du code parce qu'il ne sera pas interprété .
            'footer' permet de changer le fichier le footer appelé cependant il n'y a aucun intérêt à cela puisque dans end_html.php on y trouve uniquement le placement des variables javascript.

