<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');
if(isset($_POST['mechanic'])){

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
	$mechanicavailability  = mysqli_real_escape_string($check,$_POST['availablemechanics']);
	
	$q = mysqli_query($check,"INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `street`, `postal_code`, `state`, `city`, `country`, `phone`, `email`, `username`, `password`,`status`) VALUES (NULL, '$firstname', '$lastname', '$street', '$postalcode', '$state', '$city', '$country', '$phone', '$email', '$username', MD5('$password'), '$mechanicavailability' )");
   


	if($q){
		
		echo "done";

	}else{
		echo 'mechanicerror';
	}





}


?>