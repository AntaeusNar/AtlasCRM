<?php
class Router {
	
	protected $routes = [];
	
	public Function add($route, $params) {
		$this->routes[$route] = $params;
	}
	
	public Function getRoutes(){
		return $this->routes;
	}

	
	
}

?>