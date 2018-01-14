<?php

namespace App\Controllers;

use \Core\View;

class AisTime extends \Core\Controller
{
	
	public function indexAction()
	{
		View::render('AisTime/index.php', true);
		
	}
	
	
}
?>