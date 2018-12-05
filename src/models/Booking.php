<?php

require_once('core/Model.php');

class Booking extends Model{
	
    public function getBookings($id = false){
		$id = $this->parseUserID($id);
        $sql = "SELECT * FROM bookings";
        if ($id) {
            $sql .= " WHERE customerID = " . $id;
        }

        $res = $this->db->query($sql);
		if(!$res->num_rows){
			return null;
		}

		$return = [];
        while ($result = $res->fetch_assoc()){
			$customer = (new Customer())->findById($result['customerID']);
            $return[$result['id']]['customer_name'] = $customer['first_name'] . ' ' . $customer['second_name'];
            $return[$result['id']]['booking_reference'] = $result['booking_reference'];
            $return[$result['id']]['booking_date'] = date('D dS M Y', strtotime($result['booking_date']));
        }

        return $return;
    }
	
	private function parseUserID($id){
		if(is_int($id)){
			return $id;
		}
		
		if($id instanceof Customer){
			return $id->id;
		}
		
		if(is_string($id)){
			return intval($id);
		}
		
		return null;
	}
}
