<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');

if(isset($_POST['stock'])){
	
	$stockitem_id = mysqli_real_escape_string($check,$_POST['stockid']);
	$name  = mysqli_real_escape_string($check,$_POST['itemname']);
	$cost     = mysqli_real_escape_string($check,$_POST['itemcost']);
	$quantity     = mysqli_real_escape_string($check,$_POST['itemquantity']);
	

	$q = mysqli_query($check,"UPDATE `stock_item` SET `name`= '$name', `cost`= '$cost', `quantity` = '$quantity' WHERE `stockitem_id` = $stockitem_id");
    
	if($q){
		
		echo "done";

	}else{
		echo 'stockediterror';
	}





}


?>