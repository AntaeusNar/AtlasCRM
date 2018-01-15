<?php

//controller
namespace App\Controllers;

use \Core\View;
use App\Models\Names;

class Name extends \Core\Controller
{
	
	public function indexAction()
	{
		$names = Names::getAll();
		View::render('Names/index.php', true, $names);
	}
}

?>