<?php

namespace Core;

use App\Config;
use App\MainMenu;

class View
{
	
	//renders the view file
	public static function render($view, $menuBool)
	{
		$file = "../App/Views/$view";  //relative to the Core directory
		
		if(is_readable($file)) {
			require "../App/Views/HTMLtemplates/header.htm";
			
			if ($menuBool){
				
				$MainMenu = new MainMenu("flex-column", "nav-vert", Config::getArray());
				echo $MainMenu->display();
			}
			
			
			require $file;
			require "../App/Views/HTMLtemplates/footer.htm";
		} else {
			echo "$file not found.";
		}
	}
}

?>
