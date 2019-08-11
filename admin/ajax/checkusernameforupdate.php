<?php
// Include functions.php for database connection variable
require_once('../functions/functions.php');

 $username = mysqli_real_escape_string($check,$_POST['username']);
 $customer_id = intval($_GET['customerid']);

    $result = mysqli_query($check, "SELECT * FROM customer WHERE username = '{$username}'  AND customer_id != '{$customer_id}' LIMIT 1;");
    $num = mysqli_num_rows($result);
    if($num == 0){
        echo "true";
    } else {
        echo "false";
    }
    mysqli_close($check);
?>