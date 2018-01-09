<?php
class Router {
	
	protected $routes = [];
	protected $params = [];
	


	//adds a route to the route array with passed params
	public Function add($route, $params = []) {
		
		//Convert the route to a reg_exp
		// 1: escape forward slashes
		$route = preg_replace('/\//', '\\/', $route);
		// 2: Convert variables e.g. {controller}
		$route = preg_replace('/\{([a-z-]+)\}/', '(?P<\1>[a-z-]+)', $route);
		// 3: Add start and end delimiter and case insensitve flag
		$route = '/^' . $route . '$/i';
		
		
		$this->routes[$route] = $params;
	}
	
	//returns all routes
	public Function getRoutes(){
		return $this->routes;
	}
	
	//matchs the given url to a route if exsits give true, else gives false
	public function match($url){
		foreach ($this->routes as $route => $params) {
			if (preg_match($route, $url, $matches)){
				foreach ($matches as $key => $match) {
					if (is_string($key)){
						$params[$key] = $match;
					}
				}
			
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