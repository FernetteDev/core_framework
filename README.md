# core_framework

###########################################################################
#   ATTENTION : La notion de MVC n'est pas encore abordé dans ce projet   #
###########################################################################

####################################################################################################################
#   ATTENTION : Tous les fichiers noté comme "fonctionnel" fonctionnent et peuvent faire l'objet de mise à jour    #
#               Tous les fichiers ne faisant pas état du terme de "fonctionnel" ou ne mentionnant pas une          #
#               mise à jour sont susceptible de ne pas fonctionner et feront l'objet d'un approfondissement        #
####################################################################################################################

#   Namespace Structure
#   Dernière mise à jour le 03/10/16
#   L'objet head :
#       'titre' prend le titre de l'onglet du document
#       'robot' par défaut est "index,follow" pour le suivi des robots google
#       'description' prend la description qui servira pour les robots google et pour le référencement
#       'css' est un array prend le nom des fichier sans l'extension, indiquer le chemin si le fichier se trouve dans un sous-dossier de css
#       'script' est un array prend le nom des fichier sans l'extension, indiquer le chemin si le fichier se trouve dans un sous-dossier de js
#       'Javascript' est appelé directement en bas de la page juste avant la fermeture du body après l'inclusion des fichiers '.js'
#       'afficher_head' affiche tout les éléments du head qui ont été saisis ou modifié, sinon affichera uniquement les éléments par défaut


#   Namespace Autoload
#   Fonctionnel
#   L'objet autoload : (en cours de recherche sur la récurcivité afin d'en faire un autoload qui peut naviguer de partout)

#   Namespace Chiffre
#   L'objet add_zero :

#   Namespace Configuration
#   Fonctionnel
#   L'objet information :
#       Contient toutes les constantes du site pour la configuration

#   Namespace Database
#   Fonctionnel
#   L'objet connexion :
#       Connecte la base de données

#   Namespace Html
#   Dernière mise à jour le 03/10/16
#   L'objet balise_content :
#       Contient les attributs des balises
#
#   L'objet balise :
#       "balise" permet de choisir une balise de notre choix, idéalement, "p", "div", "span", "section" ....
#       Les balises comme "a" et "img" étant des balises aux attributs plus spécifique deux objets indépendant ont été créé.
#       Pour le moment les balises ne peuvent être emboîté.
#
#   L'objet form :
#       Contient tout les éléments du formulaire
#
#   L'objet select :
#       Contient le menu select, toutes balises "<option>" se remplissent avec la function addOption

#   Namespace Image
#   L'objet crea_image :
#       Permet de copier une image et d'en réduire la taille.
#
#   L'objet rognage :
#       Permet de copier une partie d'une image, pour la selection du morceau de l'image utiliser
#       le Jquery jcrop qui permet le rognage et mettre à jour le fichier visualisationImage
#       qui permet d'afficher l'image et choisir vos "id"

#   Namespace Regex
#   (Ce namespace contiendra toutes les regex et test de validation)
#   L'objet RegexEmail :
#       Permet de tester la validité d'un mail

#   Namespace Securite
#   Mise à jour le 03/10/16
#   L'objet session : Initialise une session et la cryptera en "md5"