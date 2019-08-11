<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');
if(isset($_POST['stock'])){

	$itemname = mysqli_real_escape_string($check,$_POST['itemname']);
	$itemcost  = mysqli_real_escape_string($check,$_POST['itemcost']);
    $itemquantity     = mysqli_real_escape_string($check,$_POST['itemquantity']);
    echo $itemname;
	$q = mysqli_query($check,"INSERT INTO `stock_item` (`stockitem_id`, `name`, `cost`, `quantity`) VALUES (NULL, '$itemname', '$itemcost', '$itemquantity')");



	if($q){
		
		echo "done";

	}else{
		echo 'stockerror';
	}





}


?>