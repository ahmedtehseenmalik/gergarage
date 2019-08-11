<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');
if(isset($_POST['assignstatus'])){


    $booking_id  = mysqli_real_escape_string($check,$_POST['booking_id']);
    $bookingstatus  = mysqli_real_escape_string($check,$_POST['bookingstatus']);
    
  
    $todaydate= date('Y-m-d'); 

      
                $q1 = mysqli_query($check," Update `booking` SET `status`='{$bookingstatus}',`modified_date`='{$todaydate}'  WHERE `booking_id`='{$booking_id}' ");
                if($q1){
                    echo 'done';
                }else{
                    echo 'assignerror';
                }
           


}


?>