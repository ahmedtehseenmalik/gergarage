<?php

require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }


// Include the config file
require_once('./functions/functions.php');

$customer_id=intval($_GET['customerid']);



$q1 = mysqli_query($check,"DELETE FROM `booking` WHERE `customer_id_fk`='{$customer_id}'");
if($q1){
    $q2 = mysqli_query($check,"DELETE FROM `vehicle` WHERE `customer_id_fk`='{$customer_id}'"); 
    if($q2){
        $q3 = mysqli_query($check,"DELETE FROM `customer` WHERE `customer_id`='{$customer_id}'"); 
        if($q3){
            header('Location:' . $config['admin_url'] . 'customers.php');
        }
        
    }
}

?>







