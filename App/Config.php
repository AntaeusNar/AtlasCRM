<?php

namespace App;

class Config
{
	
	
	
	
	
	//menu array
	private static $MainMenuConfig = array(
		'home' => array('text'=>'Home', 'url'=>'?p=home'),
		'timetracker' => array('text'=>'Time Tracker', 'url'=>'?p=timetracker'),
		'about'=> array('text'=>'About', 'url'=>'?p=about'),
	);
	
	//returns the mainmenu array
	public static function getArray()
	{
		return Config::$MainMenuConfig;
	}
}
?>