<?php
use App\Config;
use App\Menu;
$ClientMenu = new Menu("flex-row", "nav-hort", Config::getArray('ClientMenu'));
echo $ClientMenu->display();
?>
