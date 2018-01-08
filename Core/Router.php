<?php
class Router {
	
	protected $routes = [];
	protected $params = [];
	
	//adds a route to the route array with passed params
	public Function add($route, $params) {
		$this->routes[$route] = $params;
	}
	
	//returns all routes
	public Function getRoutes(){
		return $this->routes;
	}
	
	//matchs the given url to a route if exsits give true, else gives false
	public function match($url){
		foreach ($this->routes as $route => $params) {
			if($url == $route) {
				$this->params = $params;
				return true;
			}
		}
		return false;
	}
	
	
	//returns the current matched parameters as an array
	public function getParams(){
		return $this->params;
	}
}

?>