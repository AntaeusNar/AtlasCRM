<?php

namespace App\Controllers;

class Home
{
	
	public function index()
	{
		echo "hello from home!";
		echo '<p>Query string parameters fron a get: <pre>' . htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
	}
}

?>
	