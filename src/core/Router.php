<?php

class Router {
	
	private $class;
	
	private $method;
	
	private $args = [];
	
	public function __construct() {
		$this->parse_request();
	}
	
	private function parse_request() {
		$uri = parse_url($_SERVER['HTTP_HOST'].'/'.$_SERVER['REQUEST_URI']);
		$path = trim($uri['path'], '//');
		
		$segments = explode('/', $path);
		/*
		 * TODO: Add a default config for the Router so this can be configured
		 */
		if(!isset($segments[0]) || $segments[0] === ''){
			$segments[0] = 'home';
		}
		// set the class to be called and clean the array
		$this->class = $segments[0];
		unset($segments[0]);
		
		if(!isset($segments[1])){
			$segments[1] = 'index';
		}
		// again set the method to be called and clean the array
		$this->method = $segments[1];
		unset($segments[1]);
		
		$this->setParams($segments);
	}
	
	public function getClass(){
		return $this->class;
	}
	
	public function getMethod(){
		return $this->method;
	}
	
	public function getParams(){
		return $this->args;
	}
	
	private function setParams($fragments){
		foreach($fragments as $arg){
			$this->args[] = $arg;
		}
		return $this; // not actually needed at the moment, maybe in the future to chain methods
	}
	
}
