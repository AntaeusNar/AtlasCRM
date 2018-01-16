<?php

//controller
namespace App\Controllers;

use \Core\View;
use App\Models\Clients;

class Client extends \Core\Controller
{
	
	//basic landing page, lists all current clients (contacts with jobs)
	public function indexAction()
	{
		$clients = Clients::getAllClients();
		
		View::render('Clients/index.php', true, $clients);
	}
	
	public function newContactAction()
	{
		View::render('Clients/newContact.php', true);
	}
	
	public function listContactsAction()
	{
		$contacts = Clients::getAllContacts();
		
		View::render('Clients/listContacts.php', true, $contacts);
		
		
	}
}
?>