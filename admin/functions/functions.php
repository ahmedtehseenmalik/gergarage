<?php 
// Include the config file
require_once('config.php');

// Checking the database connection
$check = mysqli_connect($config['db_host'],$config['db_user'],$config['db_pass'],$config['db']);
	if (!$check) {
				
	
		echo "Failed to connect to Database: " . mysqli_connect_error();
	}

// Count Total Bookings
function counttotalbooking($bookingdate){
	global $check;
	$checkbookings = mysqli_query($check,"SELECT count('booking_id') as 'bookingtotal' FROM `booking` WHERE `ordered_date` = '$bookingdate'");
	 $fet_r = mysqli_fetch_assoc($checkbookings);
	 return $fet_r['bookingtotal'];
}

//Get All Bookings
function getallBookings(){
	global $check;
	$booking = mysqli_query($check,"SELECT customer.first_name,customer.last_name,customer.email,service.name,vehicle.license_no,vehicle.vehicle_name,vehicle.vehicle_type,booking.booking_id,booking.ordered_date,booking.status FROM booking JOIN customer ON booking.customer_id_fk = customer.customer_id JOIN vehicle ON booking.customer_id_fk = vehicle.customer_id_fk JOIN service ON booking.service_id_fk = service.service_id  ");
	 return $booking;
}
//Get All Bookings of a Particular Customer
function getallBookingsforOneCustomer($customer_id){
	global $check;
	$booking = mysqli_query($check,"SELECT customer.first_name,customer.last_name,customer.email,service.name,vehicle.license_no,vehicle.vehicle_name,vehicle.vehicle_type,booking.booking_id,booking.ordered_date,booking.status FROM booking JOIN customer ON booking.customer_id_fk = customer.customer_id JOIN vehicle ON booking.customer_id_fk = vehicle.customer_id_fk JOIN service ON booking.service_id_fk = service.service_id  WHERE customer.customer_id=$customer_id");
	 return $booking;
}

//Get Booking Details
function getBookingDetails($booking_id){
	global $check;
	$booking = mysqli_query($check,"SELECT customer.first_name,customer.last_name,customer.email,customer.phone,customer.username,customer.city,customer.state,customer.country,booking.ordered_date,service.name,vehicle.vehicle_name,vehicle.make,vehicle.model_year,vehicle.license_no,vehicle.engine_type,vehicle.vehicle_type,booking.booking_id,booking.message,booking.status FROM booking JOIN customer ON booking.customer_id_fk = customer.customer_id JOIN vehicle ON booking.customer_id_fk = vehicle.customer_id_fk JOIN service ON booking.service_id_fk = service.service_id  WHERE booking.booking_id = '$booking_id'");
 	return $booking;

	 
}

//Get Booking Details
function getBookingDetailsCustomer($booking_id){
	global $check;
	$booking = mysqli_query($check,"SELECT customer.first_name,customer.last_name,customer.email,customer.phone,customer.username,customer.city,customer.state,customer.country,booking.ordered_date,service.name,vehicle.vehicle_name,vehicle.make,vehicle.model_year,vehicle.license_no,vehicle.engine_type,vehicle.vehicle_type,booking.booking_id,booking.message,booking.status FROM booking JOIN customer ON booking.customer_id_fk = customer.customer_id JOIN vehicle ON booking.customer_id_fk = vehicle.customer_id_fk JOIN service ON booking.service_id_fk = service.service_id  WHERE booking.booking_id = '$booking_id'");
 	return $booking;

	 
}



//Get All UnAssigned Bookings
function getallUnAssignedBookings(){
	global $check;
	$booking = mysqli_query($check,"SELECT customer.first_name,customer.last_name,customer.email,service.name,vehicle.license_no,vehicle.vehicle_name,vehicle.vehicle_type,booking.booking_id,booking.ordered_date,booking.status FROM booking JOIN customer ON booking.customer_id_fk = customer.customer_id JOIN vehicle ON booking.customer_id_fk = vehicle.customer_id_fk JOIN service ON booking.service_id_fk = service.service_id WHERE  booking.status = 'Booked' ");
	 return $booking;
}

//Get All Assigned Bookings to Update Status
function getallAssignedBookings(){
	global $check;
	$booking = mysqli_query($check,"SELECT customer.first_name,customer.last_name,customer.email,service.name,vehicle.license_no,vehicle.vehicle_name,vehicle.vehicle_type,booking.booking_id,booking.ordered_date,booking.status FROM booking JOIN customer ON booking.customer_id_fk = customer.customer_id JOIN vehicle ON booking.customer_id_fk = vehicle.customer_id_fk JOIN service ON booking.service_id_fk = service.service_id WHERE booking.status = 'in service' ");
	 return $booking;
}

//Get All Services
function getAllServices(){
	global $check;
	$services=mysqli_query($check,"SELECT * from `service`");
	return $services;
}

// Count Total Customers
function counttotalcustomers(){
	global $check;
	$customers = mysqli_query($check,"SELECT count('customer_id') as 'customercount' FROM `customer`");
	 $fet_r = mysqli_fetch_assoc($customers);
	 return $fet_r['customercount'];
}

// Count Pending Roaster Count for current date
function getroaster(){
	global $check;
	$date = date('Y-m-d');
	$roasters = mysqli_query($check,"SELECT count(`roaster_id`) as 'totalroaster' FROM `roaster` WHERE `status` = 'assigned' AND `date` = '$date'");
	$fet_r = mysqli_fetch_assoc($roasters);
	 return $fet_r['totalroaster'];

}

//View Invoice
function viewinvoice(){

	global $check;
	//$date = date('Y-m-d'); 
	$invoice = mysqli_query($check,"SELECT customer.first_name,customer.last_name,customer.email,service.name,vehicle.license_no,vehicle.vehicle_name,vehicle.vehicle_type,booking.booking_id,booking.ordered_date,booking.status,invoice.invoice_id,invoice.cost,invoice.discounts,invoice.modified_date FROM booking JOIN customer ON booking.customer_id_fk = customer.customer_id JOIN vehicle ON booking.customer_id_fk = vehicle.customer_id_fk JOIN service ON booking.service_id_fk = service.service_id JOIN invoice ON invoice.booking_id_fk=booking.booking_id WHERE booking.status != 'Booked'");
	 return $invoice;

}

//Get One Invoice for Modification
function getoneInvoiceforModification($invoice_id){
	global $check;
//	$date = date('Y-m-d'); 
	$invoice = mysqli_query($check,"SELECT customer.first_name,customer.last_name,customer.phone,service.name,service.cost as servicecost,vehicle.license_no,vehicle.vehicle_name,invoice.cost,invoice.discounts FROM booking JOIN customer ON booking.customer_id_fk = customer.customer_id JOIN vehicle ON booking.customer_id_fk = vehicle.customer_id_fk JOIN service ON booking.service_id_fk = service.service_id JOIN invoice ON invoice.booking_id_fk=booking.booking_id WHERE invoice.invoice_id='{$invoice_id}'");
	 return $invoice;
}



// Count Total Invoices 
function gettotalinvoices(){
	global $check;
	$invoices = mysqli_query($check,"SELECT count(`invoice_id`) as 'totalinvoices' FROM `invoice`");
	$fet_r = mysqli_fetch_assoc($invoices);
	 return $fet_r['totalinvoices'];
}


// Count stock_items
function getstockitems(){
	global $check;
	$stockitems = mysqli_query($check,"SELECT count(`stockitem_id`) as 'totalstockitems' FROM `stock_item`");
	$fet_r = mysqli_fetch_assoc($stockitems);
	 return $fet_r['totalstockitems'];
}

function getstockitemsforInvoice($invoice_id){
	global $check;
	$stockitems=mysqli_query($check,"SELECT stock_item.name,stock_item.cost  FROM stock_item JOIN invoice_stock ON invoice_stock.stock_item_fk = stock_item.stockitem_id WHERE invoice_stock.invoice_id_fk='$invoice_id'");
	//$stockitems = mysqli_query($check,"SELECT `stock_item.name`,`stock_item.cost`  FROM 'stock_item' JOIN 'invoice_stock' ON 'invoice_stock.stock_item_fk' = 'stock_item.stockitem_id' WHERE invoice_stock.invoice_id_fk='$invoice_id' ");
	 return $stockitems;
}

//Count Mechanics
function countmechanics(){
	global $check;
	$emps = mysqli_query($check,"SELECT count(`employee_id`) as 'totalemployee' FROM `employee`");
	$fet_r = mysqli_fetch_assoc($emps);
	 return $fet_r['totalemployee'];
}


//Get the Booking data for index page table
function gettodayBooking(){
	global $check;
	$date = date('Y-m-d'); 
	$booking = mysqli_query($check,"SELECT customer.first_name,customer.last_name,customer.email,service.name,vehicle.license_no,vehicle.vehicle_name,vehicle.vehicle_type,booking.booking_id,booking.ordered_date,booking.status FROM booking JOIN customer ON booking.customer_id_fk = customer.customer_id JOIN vehicle ON booking.customer_id_fk = vehicle.customer_id_fk JOIN service ON booking.service_id_fk = service.service_id WHERE booking.ordered_date = '$date' AND booking.status = 'Booked' ");
	 return $booking;
}

//Get the booking data to assign booking to a mechanic
function getoneBooking($booking_id){
	global $check;
	$booking = mysqli_query($check,"SELECT customer.first_name,customer.last_name,customer.email,service.name,service.points,vehicle.license_no,vehicle.vehicle_name,vehicle.vehicle_type,booking.booking_id,booking.ordered_date,booking.status FROM booking JOIN customer ON booking.customer_id_fk = customer.customer_id JOIN vehicle ON booking.customer_id_fk = vehicle.customer_id_fk JOIN service ON booking.service_id_fk = service.service_id WHERE  booking.booking_id = '$booking_id'");
	 return $booking;
}

//Get Available Mechanics to Assign a Booking
function getavailableMechanics(){
	global $check;
	$mechanics = mysqli_query($check,"SELECT employee_id,first_name,last_name FROM `employee` WHERE status = 'yes'");
	return $mechanics;
}

function getmechanicDailyPoints($employee_id){
	$date = date('Y-m-d'); 
	global $check;
	$employee_points = mysqli_query($check,"SELECT points FROM `employee_daily_point` WHERE employee_id_FK = '$employee_id' AND date = '$date' ");
	return $employee_points;

}

//Get the Total Customer Data
function getallcustomers(){
	global $check;
	$customers = mysqli_query($check,"SELECT * FROM `customer`");
	return $customers;
}

//Get the Single Customer Data to Edit
function getonecustomer($customer_id){
	global $check;
	$customer = mysqli_query($check,"SELECT * FROM `customer`WHERE customer_id = '$customer_id'");
	return $customer;
}


//Get All Stocks
function getallstocks(){
	global $check;
	$stocks = mysqli_query($check,"SELECT * FROM `stock_item`");
	return $stocks;
}
//Get Single Service to edit
function getoneservice($service_id){
	global $check;
	$service = mysqli_query($check,"SELECT * FROM `service` WHERE service_id = '$service_id'");
	return $service;
}


//Get the Single Stock for Edit
function getonestock($stock_id){
	global $check;
	$stock = mysqli_query($check,"SELECT * FROM `stock_item`WHERE stockitem_id = '$stock_id'");
	return $stock;
}

//Get All Mechanics
function getallmechanics(){
	global $check;
	$mechanics = mysqli_query($check,"SELECT * FROM `employee`");
	return $mechanics;
}

//Get the Single Mechanic for Edit
function getonemechanic($employee_id){
	global $check;
	$mechanic = mysqli_query($check,"SELECT * FROM `employee`WHERE employee_id = '$employee_id'");
	return $mechanic;
}


// Get the mechanics Availability
function getmechanicsavail($employee_id){
	global $check; 
	$sql = mysqli_query($check,"SELECT status from `employee` WHERE employee_id = '$employee_id'");
	$result = mysqli_fetch_assoc($sql);
	return $result['status'];
}
?>