 <?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');

if(isset($_POST['service'])){
	
	$serviceid = mysqli_real_escape_string($check,$_POST['serviceid']);
	$name  = mysqli_real_escape_string($check,$_POST['servicename']);
	$cost     = mysqli_real_escape_string($check,$_POST['servicecost']);
	$points     = mysqli_real_escape_string($check,$_POST['servicepoints']);
	

	$q = mysqli_query($check,"UPDATE `service` SET `name`= '$name', `cost`= '$cost', `points` = '$points' WHERE `service_id` = $serviceid");
    
	if($q){
		
		echo "done";

	}else{
		echo 'serviceerror';
	}





}


?>