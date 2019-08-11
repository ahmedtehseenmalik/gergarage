<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');

if(isset($_POST['cpsw'])){
	
	$password = mysqli_real_escape_string($check,$_POST['password']);
    $customer_id= mysqli_real_escape_string($check,$_POST['customer_id']);
    
    $newPassword=md5($password);
	$q = mysqli_query($check,"UPDATE `customer` SET `password`= '{$newPassword}' WHERE `customer_id` = '{$customer_id}'");
    
	if($q){
		
		echo "done";

	}else{
		echo 'error';
	}





}


?>