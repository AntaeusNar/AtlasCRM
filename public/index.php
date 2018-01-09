<?php
//starting the front controller//

//Requires
require '../App/Controllers/Home.php';
require '../Core/Router.php';


$router = new Router();


//Adding the routes multidimentional array with each route having a name, then a controller and finally an action
$router->add('',['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);


/* old code
//Require Classes
require_once "/../CLASSES/class.php";
require_once "/../CONFIG/cfg.php";
require_once "/../FUNCTIONS/functions.php";

//vars



//create objects
$MainMenu = new Menu("flex-column", "nav-vert", $mainmenu);


//load header.htm file - which loads css
include "/../HTML/templates/header.htm";

//call to generate mainmenu based off of the array mainmenu
echo $MainMenu->display();


//load index.htm which is the main veiw content
include "/../HTML/templates/index.htm";

//load footer.htm
include "/../HTML/templates/footer.htm";

end old code*/

?>