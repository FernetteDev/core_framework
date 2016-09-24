
<?php
	include ('core/Autoload/autoload.php');
	Autoload\autoloader::register();
	$structure = new \Html\Structure();
	$structure->titre('titre du site');
	$structure->css('main');

	var_dump($structure);

?>

Voici le body <br>


