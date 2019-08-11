<?php

require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }


// Include the config file
require_once('./functions/functions.php');

$employee_id=intval($_GET['mechanicid']);



$q1 = mysqli_query($check,"DELETE FROM `employee_daily_point` WHERE `employee_id_FK`='{$employee_id}'");
if($q1){
    $q2 = mysqli_query($check,"DELETE FROM `roaster` WHERE `employee_id_fk`='{$employee_id}'"); 
    if($q2){
        $q3 = mysqli_query($check,"DELETE FROM `employee` WHERE `employee_id`='{$employee_id}'"); 
        if($q3){
            header('Location:' . $config['admin_url'] . 'mechanics.php');
        }
        
    }
}

?>

