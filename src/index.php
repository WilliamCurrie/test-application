<?php

/*
 * TODO:
 * * A Helper to avoid the repetitive "echo" in the view files (maybe a _e($str){echo $str;} function?)
 */

error_reporting(E_ALL);
ini_set('display_errors', 'On');

// include de basic files to load the app
require('core/Router.php');
require('config/database.php');

// get the route segments
$RTR = new Router();
$class = ucfirst($RTR->getClass()).'Controller';
$file = 'controllers/'.$class.'.php';
$method = strtolower($RTR->getMethod());

require_once('core/Controller.php');
require_once('core/View.php');

if(!file_exists($file)){
	(new Controller())->view('errors/general', ['message'=>'The file "'.$file.'" does not exist']);
	exit(3);
}
require_once($file);

if(!class_exists($class)){
	(new Controller())->view('errors/general', ['message'=>'The class "'.$class.'" does not exist']);
	exit(3);
}

if(!method_exists($class, $method)){
	(new Controller())->view('errors/general', ['message'=>'The method "'.$method.'" does not exist or is not callable']);
	exit(3);
}

$instance = new $class();
$args = $RTR->getParams();

call_user_func_array(array($instance, $method), $args);

