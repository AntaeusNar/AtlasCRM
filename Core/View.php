<?php

namespace Core;

class View
{
	
	//renders the view file
	public static function render($view, $menuBool)
	{
		$file = "../App/Views/$view";  //relative to the Core directory
		
		if(is_readable($file)) {
			require "../HTML/templates/header.htm";
			/*
			if ($menuBool = true){
				
				$MainMenu = new Menu("flex-column", "nav-vert", $mainmenu);
				echo $MainMenu->display();
			}
			*/
			
			require $file;
			require "../HTML/templates/footer.htm";
		} else {
			echo "$file not found.";
		}
	}
}

?>
