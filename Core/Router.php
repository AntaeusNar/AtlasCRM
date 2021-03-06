<?php

namespace Core;

class Router 
{
	
	protected $routes = [];
	protected $params = [];
	


	//adds a route to the route array with passed params
	public Function add($route, $params = []) {
		
		//Convert the route to a reg_exp
		//escape forward slashes
		$route = preg_replace('/\//', '\\/', $route);
		//Convert variables e.g. {controller}
		$route = preg_replace('/\{([a-z-]+)\}/', '(?P<\1>[a-z-]+)', $route);
		//Convert variables with custome regular expressions e.g. {id:\d+}
		$route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
		//Add start and end delimiter and case insensitve flag
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
	
	public function dispatch($url) {
		
		$url = $this->removeQueryStringVariables($url);
		
		if ($this->match($url)) {
			$controller = $this->params['controller'];
			$controller = $this->convertToStudlyCaps($controller);
			//$controller = "App\Controllers\\$controller";
			$controller = $this->getNamespace() . $controller;
		
			if (class_exists($controller)) {
				$controller_object = new $controller($this->params);
				
				//check to see if the $this->params['action'] index or key exsits and if not set the k$action to index
				if (array_key_exists('action', $this->params)){
					$action = $this->params['action'];
					$action = $this->convertToCamelCase($action);
					//make sure there is something in the action variables
				} else {
					$action = 'index';
				}
				
				
				if (preg_match('/action$/i', $action) == 0) {
					$controller_object->$action();
				} else {
					echo "Method $action (in controller $controller) cannot be accessed directly, remove the action suffix";
				}
			} else {
				echo "Controller class $controller not found";
			}
		} else {
			echo 'No route matched';
		}
	}
	
	// some function to change case etc....
	protected function convertToStudlyCaps($string) {
		return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
	}
	protected function convertToCamelCase($string){
		return lcfirst($this->convertToStudlyCaps($string));
	}
	
	//remove the vairalbves from the urls
	protected function removeQueryStringVariables($url)
	{
		if($url != '') {
			$parts = explode('&', $url, 2);
			
			if (strpos($parts[0], '=') === false) {
				$url = $parts[0];
			} else{
				$url = '';
			}
		}
		
		return $url;
		
	}
	
	//gets or sets non-defualt namespace
	protected function getNamespace()
	{
		$namespace = 'App\Controllers\\';
		
		if (array_key_exists('namespace', $this->params)) {
			$namespace .= $this->params['namespace'] . '\\';
		}
		
		return $namespace;
	}
}

?>