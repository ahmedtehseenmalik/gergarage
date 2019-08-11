<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');

if(isset($_POST['stockitemquantity'])){
	
	$stockitem_id = mysqli_real_escape_string($check,$_POST['id']);
   
    
    $q = mysqli_query($check,"SELECT * FROM `stock_item` WHERE stockitem_id = '$stockitem_id'");
   


    
	if($q){
		if(mysqli_num_rows($q) > 0 ){
            while ($row = mysqli_fetch_array($q)) { 
                  
                   $quantity = $row['quantity'];
                   if($quantity > 0){
                    $quantity=$quantity-1;
    
                    $q2 = mysqli_query($check,"UPDATE `stock_item` SET `quantity` = '$quantity' WHERE `stockitem_id` = '$stockitem_id'");
                   if($q2){
                    echo "done";
                   }
                   else{
                    echo 'error level 2';
                    }
                }
                else{
                    echo 'error level 3';
                }

            }
        }
        else{
            echo 'error level 4';
        }        
		
      

    }
    else{
		echo 'error level 1';
	}





}


?>