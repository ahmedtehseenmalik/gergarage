<?php
require_once './functions/config.php' ;
session_start();
if (!isset($_SESSION['userid']) AND ($_SESSION['usertype'] != 'admin')) {
	header('Location:' . $config['admin_url'] . 'login.php');
  }


// Include the config file
require_once('./functions/functions.php');

$stockitem_id=intval($_GET['stockid']);

$q1 = mysqli_query($check,"DELETE FROM `invoice_stock` WHERE `stock_item_fk`='{$stockitem_id}'");
if($q1){
    $q2 = mysqli_query($check,"DELETE FROM `stock_item` WHERE `stockitem_id`='{$stockitem_id}'"); 
    if($q2){
            header('Location:' . $config['admin_url'] . 'stocks.php');
    }
}

?>