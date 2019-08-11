<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');

if(isset($_POST['cpsw'])){
	
	$password = mysqli_real_escape_string($check,$_POST['password']);
    $user_id= mysqli_real_escape_string($check,$_POST['user_id']);
    
    $newPassword=md5($password);
	$q = mysqli_query($check,"UPDATE `user` SET `password`= '{$newPassword}' WHERE `user_id` = '{$user_id}'");
    
	if($q){
		
		echo "done";

	}else{
		echo 'error';
	}





}


?>