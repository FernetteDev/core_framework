<?php
	include_once('core/Autoload/autoload.php');
	Autoload\autoloader::register();
	$head = new Structure\head();
	$head->titre('bien joué');
	$head->css(array('main'));
	$head->viewport('width=device-width');
	$head->script(array('jquery_3.1.1', 'script'));




	

?>

Voici le body <br>
