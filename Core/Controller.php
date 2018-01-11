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
	

?>