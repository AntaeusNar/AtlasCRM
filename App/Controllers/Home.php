<?php

namespace App\Controllers;

class Home extends \Core\Controller
{
	
	public function indexAction()
	{
		echo "hello from home!";
		echo '<p>Query string parameters from route_params: <pre>' . htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
	}
}

?>
	