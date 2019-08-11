<?php
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');
if(isset($_POST['booking'])){
	$customer_id = "";
	$vehicle_id = "";
	$booking_id = "";
	$firstname = mysqli_real_escape_string($check,$_POST['firstname']);
	$lastname  = mysqli_real_escape_string($check,$_POST['lastname']);
	$email     = mysqli_real_escape_string($check,$_POST['email']);
	$phone     = mysqli_real_escape_string($check,$_POST['phone']);
	$username  = mysqli_real_escape_string($check,$_POST['username']);
	$password  = mysqli_real_escape_string($check,$_POST['password']);
	$street    = mysqli_real_escape_string($check,$_POST['street']);
	$city      = mysqli_real_escape_string($check,$_POST['city']);
	$state 	   = mysqli_real_escape_string($check,$_POST['state']);
	$postalcode = mysqli_real_escape_string($check,$_POST['postalcode']);
	$country    = mysqli_real_escape_string($check,$_POST['country']);
	$bookingdate = mysqli_real_escape_string($check,$_POST['bookingdate']);
	$servicetype = mysqli_real_escape_string($check,$_POST['servicetype']);
	$vehiclename = mysqli_real_escape_string($check,$_POST['vehiclename']);
	$vehiclemake  = mysqli_real_escape_string($check,$_POST['vehiclemake']);
	$vehicleyear = mysqli_real_escape_string($check,$_POST['vehicleyear']);
	$licenseno = mysqli_real_escape_string($check,$_POST['licenseno']);
	$enginetype = mysqli_real_escape_string($check,$_POST['enginetype']);
	$vehicletype = mysqli_real_escape_string($check,$_POST['vehicletype']);
	$additionalmsg = mysqli_real_escape_string($check,$_POST['additionalmsg']);
	$bookingcost = mysqli_real_escape_string($check,$_POST['bookingcost']);
// Calling functions from functions.php
	$bookingtotal = counttotalbooking($bookingdate);


	if($bookingtotal < $config['bookings_per_day']){
		$q = mysqli_query($check,"INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `street`, `postal_code`, `state`, `city`, `country`, `email`, `phone`, `username`, `password`) VALUES (NULL, '$firstname', '$lastname', '$street', '$postalcode', '$state', '$city', '$country', '$email', '$phone', '$username', MD5('$password'))");

		if($q){
			$customer_id =  $check->insert_id;
			$q1 = mysqli_query($check,"INSERT INTO `vehicle` (`vehicle_id`, `vehicle_name`, `license_no`, `engine_type`, `make`, `model_year`, `vehicle_type`, `customer_id_fk`) VALUES (NULL, '$vehiclename', '$licenseno', '$enginetype', '$vehiclemake', '$vehicleyear', '$vehicletype', '$customer_id')");
			if($q1){

				$vehicle_id =  $check->insert_id;

				$q2 = mysqli_query($check,"INSERT INTO `booking` (`booking_id`, `message`, `status`, `ordered_date`, `modified_date`, `customer_id_fk`, `service_id_fk`) VALUES (NULL, '$additionalmsg', 'Booked', '$bookingdate', '$bookingdate', '$customer_id', '$servicetype')");
				if($q2){

					$booking_id =  $check->insert_id;
					$q3 = mysqli_query($check,"INSERT INTO `invoice` (`invoice_id`, `cost`, `discounts`, `ordered_date`, `modified_date`, `booking_id_fk`) VALUES (NULL, '$bookingcost', '0', '$bookingdate', '$bookingdate', '$booking_id')");

				}
			}
		}
	}else{
		echo 'bookingerror';
	}





}


?>
