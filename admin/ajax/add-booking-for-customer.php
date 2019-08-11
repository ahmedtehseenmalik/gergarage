<?php
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');
if(isset($_POST['booking'])){


    $vehicle_id = "";
    $booking_id = "";





    $customer_id = mysqli_real_escape_string($check,$_POST['customer_id']);
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

			$q1 = mysqli_query($check,"INSERT INTO `vehicle` (`vehicle_id`, `vehicle_name`, `license_no`, `engine_type`, `make`, `model_year`, `vehicle_type`, `customer_id_fk`) VALUES (NULL, '$vehiclename', '$licenseno', '$enginetype', '$vehiclemake', '$vehicleyear', '$vehicletype', '$customer_id')");
			if($q1){

				$q2 = mysqli_query($check,"INSERT INTO `booking` (`booking_id`, `message`, `status`, `ordered_date`, `modified_date`, `customer_id_fk`, `service_id_fk`) VALUES (NULL, '$additionalmsg', 'Booked', '$bookingdate', '$bookingdate', '$customer_id', '$servicetype')");
				if($q2){

					$booking_id =  $check->insert_id;
					$q3 = mysqli_query($check,"INSERT INTO `invoice` (`invoice_id`, `cost`, `discounts`, `ordered_date`, `modified_date`, `booking_id_fk`) VALUES (NULL, '$bookingcost', '0', '$bookingdate', '$bookingdate', '$booking_id')");

				}
			}

	}else{
		echo 'bookingerror';
	}





}


?>
