<?php

//controller
namespace App\Controllers;

use \Core\View;
use \App\Models\Clients;

class Client extends \Core\Controller
{
	
	//basic landing page, lists all current clients (contacts with jobs)
	public function indexAction()
	{
		$clients = Clients::getAllClients();
		
		View::render('Clients/index.php', true, $clients);
	}
	
	
	//add a new contact
	public function newContactAction()
	{
		//render the new contact page
		View::render('Clients/newContact.php', true);
		
		//activats when user pesses submit!
		if(isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'Submit') {
			
			
			//makes sure there is a first and last name
			if($_POST['first_name'] != ''  && $_POST['last_name'] != '') {
				
				//puts first and last name into a nice little array making sure the first letter is a cap
				$new_name = array(
					"first_name" => ucwords($_POST['first_name']),
					"last_name" => ucwords($_POST['last_name']),
				);
				
				//will insert this into the names table and return the id
			}
			
			//echo '<pre>';
			//echo htmlspecialchars(print_r($_POST, True));
			//echo '</pre>';
			Clients::addContact();
		}
	}
	
	public function listContactsAction()
	{
		$contacts = Clients::getAllContacts();
		
		View::render('Clients/listContacts.php', true, $contacts);
		
		
	}
}
?>