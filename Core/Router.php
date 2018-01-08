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
		
		//Match to fixed URL format /controller/action
		$reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
		
		if (preg_match($reg_exp, $url, $matches)) {
			//get named capture groups
			$params = [];
			
			foreach ($matches as $key =>$match) {
				if (is_string($key)) {
					$params[$key] = $match;
				}
			}
			
			$this->params = $params;
			return true;
			
		}
		
		/*old
		foreach ($this->routes as $route => $params) {
			if($url == $route) {
				$this->params = $params;
				return true;
			}
		}
		*/
		
		return false;
	}
	
	
	//returns the current matched parameters as an array
	public function getParams(){
		return $this->params;
	}
}

?>