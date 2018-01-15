<?php

//Model

namespace App\Models;

use PDO;

class Clients extends \Core\Model
{
	
	
	//gets all the current clients and details from the database
	public static function getAll()
	{
		try {
			
			$db = static::getDB();
			
			//select some basic client info
			$sql = 	 'SELECT * FROM clients';
					
			$stmt = $db->query($sql) or die($db->error);
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $results;
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
	}
}
?>