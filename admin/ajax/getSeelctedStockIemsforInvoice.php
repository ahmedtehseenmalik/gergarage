<?php 
// Include functions.php for database connection variable
require_once('../functions/functions.php');
require_once('../functions/config.php');

if(isset($_POST['items'])){
	
	$selecteditemsids =$_POST['selecteditemsids'];
    $result;
    $i=0;
	foreach ($selecteditemsids as $item) {
        $stock = mysqli_query($check,"SELECT * FROM `stock_item`WHERE stockitem_id = '$item'");   
        $result[$i]=$stock;
        $i++;
    }
	
	
   echo $result;





}


?>