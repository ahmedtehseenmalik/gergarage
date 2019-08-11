<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');

if(isset($_POST['invoice'])){
	$cost = mysqli_real_escape_string($check,$_POST['cost']);
	$invoice_id = mysqli_real_escape_string($check,$_POST['invoiceid']);
	$discount  = mysqli_real_escape_string($check,$_POST['discount']);
	$stockitemsids     = mysqli_real_escape_string($check,$_POST['stockitemsids']);
	//echo $invoice_id.' '.$discount.' '.$stockitemsids;
	$array = str_split($stockitemsids);
    $date = date('Y-m-d'); 
	$q = mysqli_query($check,"UPDATE `invoice` SET `cost`= '$cost', `discounts`= '$discount', `modified_date` = '$date' WHERE `invoice_id` = $invoice_id");
    
	if($q){
        foreach ($array as $stockitemid) {
            $q2 = mysqli_query($check,"INSERT INTO `invoice_stock` (`invoice_id_fk`,`stock_item_fk`) VALUES('$invoice_id','$stockitemid')"); 
           }
 
		
		echo "done";

	}else{
		echo 'invoiceerror';
	}





}


?>