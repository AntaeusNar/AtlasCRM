<?php

namespace App\Controllers;

class Home extends \Core\Controller
{
	
	public function index()
	{
		echo "hello from home!";
		echo '<p>Query string parameters from a get: <pre>' . htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
	}
}

?>
	