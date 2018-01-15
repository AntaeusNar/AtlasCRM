<?php

namespace App;

class Config
{
	
	//database configuration information
	const DB_HOST = 'localhost';
	const DB_NAME = 'atlascrm';
	const DB_USER = 'atlascrm';
	const DB_PASSWORD = '@Las3509';
	
	
	
	//mainmenu array
	private static $MainMenuConfig = array(
		'home' => array('text'=>'Home', 'url'=>'../home/index'),
		'client' => array('text'=>'Clients', 'url'=>'../client/index'),
		'timetracker' => array('text'=>'Time Tracker', 'url'=>'../AisTime/index'),
		'name' => array('text'=>'Names', 'url'=>'../name/index'),
		'about'=> array('text'=>'About', 'url'=>'../about/index'),
	);
	
	private static $ClientMenuConfig = array(
		'newcontact' => array('text'=>'New Contact', 'url'=>'../client/newContact'),
		'newjob' => array('text'=>'New Job', 'url'=>'../client/newJob'),
		'list' => array('text'=>'List Current', 'url'=>'../client/index'),
	);
	
	//returns the mainmenu array
	public static function getArray($array)
	{
		switch ($array) {
			case "MainMenu":
				return Config::$MainMenuConfig;
				break;
			case "ClientMenu":
				return Config::$ClientMenuConfig;
				break;
		}
	}
}
?>