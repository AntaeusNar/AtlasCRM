<?php

namespace App;

class Config
{
	
	
	
	
	
	//menu array
	private static $MainMenuConfig = array(
		'home' => array('text'=>'Home', 'url'=>'../home/index'),
		'timetracker' => array('text'=>'Time Tracker', 'url'=>'../AisTime/index'),
		'about'=> array('text'=>'About', 'url'=>'../about/index'),
	);
	
	//returns the mainmenu array
	public static function getArray()
	{
		return Config::$MainMenuConfig;
	}
}
?>