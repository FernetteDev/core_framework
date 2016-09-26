
<?php
	include_once('core/Autoload/autoload.php');
	Autoload\autoloader::register();
	$head = new Structure\head();
	$head->titre('bien joué');
	$head->css(array('main'));
	$head->charset('UTF-8');





?>
<body>

Voici le body <br>
</body>


