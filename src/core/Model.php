<?php

/*
 * TODO: Include ViewModels to clean up the user inputs
 */

class Model {
	
	/*
	 * TODO:
	 * * A proper ORM
	 * * A proper data validation (maybe using the ViewModel pattern?)
	 * * Query Builder (so queries don't need to be written in every method)
	 */
	
	protected $db;
	
	public function __construct(){
		$this->db = new \mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME, DBPORT);
	}
	
	public function __destruct(){
		mysqli_close ($this->db);
	}
	
}
