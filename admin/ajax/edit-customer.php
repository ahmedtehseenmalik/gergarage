<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');

if(isset($_POST['customer'])){
	
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
	$customer_id =  mysqli_real_escape_string($check,$_POST['customerid']);

	$q = mysqli_query($check,"UPDATE `customer` SET `first_name`= '$firstname', `last_name`= '$lastname', `street` = '$street', `postal_code` = '$postalcode', `state` = '$state', `city`= '$city', `country` = '$country', `email`= '$email', `phone`= '$phone', `username`= '$username', `password`= MD5('$password') WHERE `customer_id` = $customer_id");
    
	if($q){
		
		echo "done";

	}else{
		echo 'customerediterror';
	}





}


?>