<?php
class Router {
	
	protected $routes = [];
	
	public Function add($route, $params) {
		$this->routes[$route] = $parms;
	}
	
	public Function getRoutes(){
		return $this->routes;
	}

	
	
}

?>