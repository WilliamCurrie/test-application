<?php

require_once('models/Customer.php');
require_once('models/Booking.php');

class HomeController extends Controller {
	
	public function index($userID = false){
		$customer = new Customer();
		$booking = new Booking();
		
		$customer->firstName = 'P.';
		$customer->lastName = 'Sherman';
		$customer->address = '42 Wallaby Way';
		
		// These lines have been commented out so we don't store a new user in every reload.
		// Feel free to uncomment them to check that they work properly
		//$customer->save();
		//$ourCustomer = $customer->getCurrentCustomersBySurname();
		
		$data = [
			'bookings' => $booking->getBookings($userID),
			'customers' => $customer->getAllCustomers(),
			'our_customer' => $customer->findById($userID)
		];
		
		$this->view('bookings', $data);

	}
	
}
