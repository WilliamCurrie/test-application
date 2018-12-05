<?php

require_once('core/Model.php');

class Customer extends Model {
	
	protected $table = 'customers'; // now the table can be easily changed without rewriting all the queries
	
	public $title;
    public $firstName;
    public $lastName;
    public $address;

    function save(){
		$query = 'INSERT INTO '.$this->table.' (first_name, second_name, address) VALUES (\''.$this->firstName.'\', \''.$this->lastName.'\', \''.$this->address.'\')';
        $this->db->query($query);
		$this->id = $this->db->insert_id;
		return $this;
    }
	
    function getCurrentCustomersBySurname(){
        return $this->db->query('SELECT * FROM '.$this->table.' WHERE second_name = "'.$this->lastName.'" ORDER BY second_name');
    }

    public function formatNames($firstName, $surname) {
        return $firstName . ' ' . $surname;
    }

    function findById(int $id){
		if(!is_int($id)){
			try{
				$id = intval($id);
			} catch (Exception $ex) {
				$id = $this->db->real_escape_string($id); // will fail querying, but we make sure to not get injections
			}
		}
        return $this->db->query('SELECT * FROM '.$this->table.' WHERE id = '.$id)->fetch_assoc();
    }

	//Get all the customers from the database and output them
	function getAllCustomers(){
		return $this->db->query('SELECT * FROM '.$this->table)->fetch_all(MYSQLI_ASSOC);
	}
	
	public function __toString() {
		return $this->firstName.' '.$this->lastName;
	}
	
	public function __set($name, $value) {
		$this->$name = $this->db->real_escape_string($value);
	}

}
