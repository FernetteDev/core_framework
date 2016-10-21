<?php
	include_once('core/Autoload/autoload.php');
	Autoload\autoloader::register();
	$head = new Structure\head();
	$head->titre('tout le "head est en objet"');
	$head->css(array('main'));
	$head->script(array('jquery_3.1.1', 'script'));
	$head->afficher_head();
	use Securite\session;
	$session = new session();
	$connexion = new Database\connexion();
	var_dump($connexion);

	settype($strNom, 'string');
	settype($strNomError, 'string');
	settype($strNumber, 'string');
	settype($strNumberError, 'string');
	settype($blnError, 'bool');



	$bln = isset($_POST['btn']);
	if ($bln) {
		$strNom = trim(strip_tags($_POST['txtNom']));
		if($strNom == '') {
			$strNomError = "Obligatoire.";
			$blnError = true;
		}
		$strNumber = trim(strip_tags($_POST['intNumber']));
		$session->creation($strNumber);
		var_dump($session);
		if($strNumber == '') {
			$strNumberError = "Obligatoire.";
			$blnError = true;
		}
		if(!$blnError){
			$ajout = $connexion->oPDO->prepare('INSERT INTO session(pseudo, mdp) VALUES(:pseudo, :mdp)');
			$ajout->bindValue(':pseudo', $strNom);
			$ajout->bindValue(':mdp', $strNumber);
			$ajout->execute();
		}
	}
	?>


<form action="#" method="post">
	<input type="text" name="txtNom">
	<input type="number" name="intNumber">
	<button name="btn" >envoyer</button>
</form>



