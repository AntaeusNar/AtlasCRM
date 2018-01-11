<?php

namespace Core;

/**
	*	Base Controller
	*
	*/
	
abstract class Controller
{

	//Parameters from the matched route @var array
	protected $route_params = [];
	
	//class constructor
	public function __construct($route_params)
	{
		$this->route_params = $route_params;
	}
	
	//call magic method
	public function __call($name, $args)
	{
		$method = $name . 'Action';
		
		if (method_exists($this, $method)){
			if ($this->before() !== false) {
				call_user_func_array([$this, $method], $args);
				$this->after();
			}
		} else {
			echo "Method $method not found in controller " . get_class($this);
		}
	}
	
	//called before the method
	protected function before()
	{
		
	}
	
	//called after the method
	protected function after()
	{
	}
			
}

?>