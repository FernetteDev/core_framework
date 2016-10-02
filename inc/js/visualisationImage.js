//////////////////////////////////////////////////////////////
// Initialisation des variables de visualisation des images //
//////////////////////////////////////////////////////////////

var canvasWidth = 150;  // largeur du canvas       |
var canvasHeight = 150; // hauteur du canvas       |
var widthMax = 150;     // largeur maximum toléré  |
var heightMax = 150;    // hauteur maximum toléré  |

//////////////////////////////////////////////////
// Affichage dynamique de l'image au chargement //
//////////////////////////////////////////////////

var parent = document.getElementById('imgstore'); // On défini le parent de l'image à insérer
var x = document.getElementById("getimage");      // On va chercher l'input "type FILE"
x.addEventListener('change', uploadImg, false);

// Fonction de chargement de l'image
function uploadImg(arg) {
	var filename = arg.target.files[0];
	var fr = new FileReader();  // Instanciation de l'objet 'FileReader()'
	fr.onload = recupImg;       // Activation de la fonction 'recupImage' au chargement de l'image
	fr.readAsDataURL(filename); // Lecture de l'URL de l'image récupéré
}

// Fonction d'affichage de l'image
function recupImg(arg) {
	// On crée la balise de l'image
	var img = document.createElement('img');
	// On donne un id à l'image
	img.setAttribute('id', 'cropbox');
	// On défini la source de l'image
	img.setAttribute('src', arg.target.result);
	// Attribution du css
	//img.setAttribute('style', 'max-width:100%;');
	// Positionnement de l'image créé dans son parent
	parent.appendChild(img);
	img.style.top = "0px";
	img.style.left = "0px";
	// Récupération du bouton de rognage
	var bouton = document.getElementById('btn');
	bouton.classList.remove('hide');

	//////////////////////////////////////////////
	// Affichage et gestion du carré de rognage //
	//////////////////////////////////////////////

	$('#cropbox').Jcrop({
		aspectRatio: 1,
		onSelect: updateCoords
	});

	function updateCoords(c) {
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
		// Création de l'image du canvas au chargement
		window.onload = initVisu();
	}

	function initVisu() {
		// Récupération du canvas et du context
		var canvas = document.getElementById('apercu');
		var context = canvas.getContext('2d');
		// Gestion de l'affichage du canvas
		canvas.classList.remove('hide');
		var widthApercu;  // Initialisation de la variable
		var heightApercu; // Initialisation de la variable
		// Récupération des valeurs du carré de rognage
		var sourceX = $('#x').val();
		var sourceY = $('#y').val();
		var sourceWidth = $('#w').val();
		var sourceHeight = $('#h').val();
		// Calcul des pourcentages hauteur et largeur pour l'affichage
		if ((sourceWidth > widthMax) || (sourceHeight > heightMax)) {
			if (sourceWidth > sourceHeight) {
				widthApercu = parseInt(sourceWidth * (widthMax / sourceWidth));
				heightApercu = parseInt(sourceHeight * (widthMax / sourceWidth));
			} else {
				widthApercu = parseInt(sourceWidth * (heightMax / sourceHeight));
				heightApercu = parseInt(sourceHeight * (heightMax / sourceHeight));
			}
			img.style.width = widthApercu;
			img.style.height = heightApercu;
		} else {
			img.style.width = sourceWidth;
			img.style.height = sourceHeight;
		}
		// Mise en mémoire tampon du context
		context.save();
		// Positionnement de la copie de l'image dans le context
		context.drawImage(img, sourceX, sourceY, sourceWidth, sourceHeight, 0, 0, widthApercu, heightApercu);
		// Affichage de l'image
		context.restore();
	}

	function checkCoords() {
		if (parseInt($('#w').val()))
			return true;
		alert('Merci de selectionner une région à rogner.');
		return false;
	}

} // fin de la création de l'image