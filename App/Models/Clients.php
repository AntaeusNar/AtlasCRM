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
			$sql = 	 'SELECT DISTINCT atlas__names.first_name, atlas__names.last_name, atlas__companies.company_name '
					.'FROM atlas__names '
					.'INNER JOIN atlas__contact ON atlas__contact.name_id = atlas__names.name_id '
					.'INNER JOIN atlas__companies ON atlas__contact.company_id = atlas__companies.company_id '
					.'INNER JOIN atlas__job_list ON atlas__contact.contact_id = atlas__job_list.billto_party '
					;
					
			$stmt = $db->query($sql) or die($db->error);
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $results;
		} catch (PDOExeption $e) {
			echo $e->getMessage();
		}
	}
}
?>