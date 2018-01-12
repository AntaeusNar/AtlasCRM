<?php

namespace App\Controllers;

use \Core\View;

class AisTime extends \Core\Controller
{
	
	public function indexAction()
	{
		echo "Hello from AisTime/index";
		echo '<p>Query string parameters from a get: <pre>' . htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
		
	}
	
	
}
?>