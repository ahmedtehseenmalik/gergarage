<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');

if(isset($_POST['cpsw'])){
	
	$password = mysqli_real_escape_string($check,$_POST['password']);
    $employee_id= mysqli_real_escape_string($check,$_POST['employee_id']);
    echo $password;
    echo $employee_id;
    $newPassword=md5($password);
	$q = mysqli_query($check,"UPDATE `employee` SET `password`= '{$newPassword}' WHERE `employee_id` = '{$employee_id}'");
    
	if($q){
		
		echo "done";

	}else{
		echo 'error';
	}





}


?>