<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');

if(isset($_POST['savb'])){
	
	$status = mysqli_real_escape_string($check,$_POST['status']);
    $employee_id= mysqli_real_escape_string($check,$_POST['employee_id']);
    echo $status;
    echo $employee_id;
    
	$q = mysqli_query($check,"UPDATE `employee` SET `status`= '{$status}' WHERE `employee_id` = '{$employee_id}'");
    
	if($q){
		
		echo "done";

	}else{
		echo 'error';
	}





}


?>