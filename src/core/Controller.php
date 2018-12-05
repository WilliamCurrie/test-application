<?php

class Controller {

	protected $view;

	public function __construct() {
		$this->view = new View();
	}

	/*
	 * This method has been added here so it's accesible from all the 
	 * (child) controllers
	 */

	public function view($file, $data = []) {
		echo $this->view->render($file, $data);
	}

}
