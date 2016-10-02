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

	?>


<h1>contenu du site</h1>




