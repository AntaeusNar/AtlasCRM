<?php

//controller
namespace App\Controllers;

use \Core\View;
use App\Models\Clients;

class Client extends \Core\Controller
{
	public function indexAction()
	{
		View::render('Clients/index.php');
	}
}
?>