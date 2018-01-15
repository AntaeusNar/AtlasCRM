<?php
//model

namespace App\Models;

use PDO;

class Names extends \Core\Model
{
	
	
	//get all the names from the name table inside the dba_close
	public static function getAll()
	{
		try {
			
			$db = static::getDB();
			
			$sql = 'SELECT name_id, first_name, last_name, date FROM atlas__names';
			$stmt = $db->query($sql) or die($db->error);
			
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			return $results;
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
	
}

?>