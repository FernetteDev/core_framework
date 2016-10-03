<?php
	include_once('core/Autoload/autoload.php');
	Autoload\autoloader::register();
	$head = new Structure\head();
	$head->titre('tout le "head est en objet"');
	$head->css(array('main'));
	$head->script(array('jquery_3.1.1', 'script'));
	$head->afficher_head();

	$balise = new \Html\balise();
	$balise->a('toto');

	$mdp = new \Securite\Session();


	$md5 = sha1('toto');
	var_dump($md5);
	$md5 = md5('toto');
	var_dump($md5);

	var_dump($mdp->crypter('toto'));
	var_dump(mcrypt_encrypt());
	var_dump(MCRYPT_RIJNDAEL_256);
	var_dump(MCRYPT_MODE_ECB);

	var_dump(mcrypt_list_algorithms());
	var_dump(mcrypt_list_modes());

	?>


<h1>contenu du site</h1>



