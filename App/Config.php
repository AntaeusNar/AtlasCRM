<?php

namespace App;

class Config
{
	
	//database configuration information
	const DB_HOST = 'localhost';
	const DB_NAME = 'atlascrm';
	const DB_USER = 'atlascrm';
	const DB_PASSWORD = '@Las3509';
	
	
	
	//menu array
	private static $MainMenuConfig = array(
		'home' => array('text'=>'Home', 'url'=>'../home/index'),
		'client' => array('text'=>'Client', 'url'=>'../client/index'),
		'timetracker' => array('text'=>'Time Tracker', 'url'=>'../AisTime/index'),
		'name' => array('text'=>'Names', 'url'=>'../name/index'),
		'about'=> array('text'=>'About', 'url'=>'../about/index'),
	);
	
	//returns the mainmenu array
	public static function getArray()
	{
		return Config::$MainMenuConfig;
	}
}
?>