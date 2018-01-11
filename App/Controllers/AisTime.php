<?php

namespace App\Controllers;

class AisTime extends \Core\Controller
{
	
	public function index()
	{
		echo "Hello from AisTime/index";
		echo '<p>Query string parameters from a get: <pre>' . htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
		
	}
	
	
}
?>