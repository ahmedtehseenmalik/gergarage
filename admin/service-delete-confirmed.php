<?php
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }


// Include the config file
require_once('./functions/functions.php');

$service_id=intval($_GET['service_id']);
  $q =  mysqli_query($check,"SELECT booking_id from booking WHERE service_id_fk='{$service_id}'");
 
  if(mysqli_num_rows($q) > 0) {
     while($row = mysqli_fetch_assoc($q)){ 
      $q2 = mysqli_query($check,"DELETE FROM invoice WHERE booking_id_fk='{$row['booking_id']}'");
      if($q2){
        $q3 = mysqli_query($check,"DELETE FROM roaster WHERE booking_id_fk='{$row['booking_id']}'");
        if($q3){
          $q4 = mysqli_query($check,"DELETE FROM service WHERE service_id='{$service_id}'");
          if($q4){
            header('Location:' . $config['admin_url'] . 'services.php');
          }
        }
      }
    }
  }else{
    $q4 = mysqli_query($check,"DELETE FROM service WHERE service_id='{$service_id}'");
    if($q4){
      header('Location:' . $config['admin_url'] . 'services.php');
    }
  }


?>