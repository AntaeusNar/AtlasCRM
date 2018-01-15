<?php

namespace Core;

use App\Config;
use App\Menu;

class View
{
	
	//renders the view file
	public static function render($view, $menuBool = true, $data = null)
	{
		$file = "../App/Views/$view";  //relative to the Core directory
		
		if(is_readable($file)) {
			require "../App/Views/HTMLtemplates/header.htm";
			
			if ($menuBool){
				
				$MainMenu = new Menu("flex-column", "nav-vert", Config::getArray('MainMenu'));
				echo $MainMenu->display();
			}
			
			//pull the file asked for
			require $file;
			require "../App/Views/HTMLtemplates/footer.htm";
		} else {
			echo "$file not found.";
		}
	}
}

?>
