<?php

//Model

namespace App\Models;

use PDO;

class Clients extends \Core\Model
{
	
	
	//gets all the current clients and details from the database
	public static function getAllClients()
	{
		try {
			
			$db = static::getDB();
			
			//select some basic client info
			$sql = 	 'SELECT * FROM clientv2';
					
			$stmt = $db->query($sql) or die($db->error);
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $results;
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
	}
	
	//gets all the current contacts
	public static function getAllContacts()
	{
		try {
			
			$db = static::getDB();
			
			//select some basic client info
			$sql = 	 'SELECT * FROM contacts';
					
			$stmt = $db->query($sql) or die($db->error);
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $results;
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
	}
	
	//add a new contacts
	public static function addContact()
	{
		echo '<pre>';
		echo htmlspecialchars(print_r($_POST, True));
		echo '</pre>';
	}
}
?>