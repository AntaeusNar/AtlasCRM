<?php

//Model for database insertion and data verification


namespace App\Models;

use PDO;

class Database extends \Core\Model
{
	
	//checks and inserts one record into the names table, returns the record id that was inserted
	public static function insertName($name)
	{
		$db = static::getDB();
		
		//some sql magic to see if the record exsits, 
		//add if it doesn't and return either the new id or the old matching id..i hope
		
		$sql = sprintf("SELECT name_id FROM %s WHERE (%s) = (%s) limit 1", "names", implode(", ", array_keys($name)),":" . implode(", :", array_keys($name)));
		
		$stmt = $db->query($sql) or die($db->error);
		$result = $stmt->fetchAll(PDO::FETCH_COLUMN);
		if ($result != NULL)
		{
			return $result;
		}
		
		$sql = sprintf("INSERT INTO %s (%s) values (%s);", "names", implode(", ", array_keys($name)),":" . implode(", :", array_keys($name)));
		
	}
	
	//checks and inserts one record into the address table, returns the record id that was inserted
	public static function insertAddress()
	{
		
	}
	
	//same for company
	public static function insertCompany()
	{
		
	}
	
	
	//same for contact
	public static function insertContact()
	{
		
	}
	
	
	
	
	
}
?>