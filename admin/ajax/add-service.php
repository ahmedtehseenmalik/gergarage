<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');
if(isset($_POST['service'])){

	$servicename = mysqli_real_escape_string($check,$_POST['servicename']);
	$servicecost  = mysqli_real_escape_string($check,$_POST['servicecost']);
    $servicepoints     = mysqli_real_escape_string($check,$_POST['servicepoints']);
    
	$q = mysqli_query($check,"INSERT INTO `service` (`service_id`, `name`, `cost`, `points`) VALUES (NULL, '$servicename', '$servicecost', '$servicepoints')");



	if($q){
		
		echo "done";

	}else{
		echo 'serviceerror';
	}





}


?>