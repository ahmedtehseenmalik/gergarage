<?php
// Include functions.php for database connection variable
require_once('../functions/functions.php');

 $email = mysqli_real_escape_string($check,$_POST['email']);
 $mechanicid = intval($_GET['mechanicid']);
    $result = mysqli_query($check, "SELECT * FROM employee WHERE email = '{$email}' AND employee_id != '{$mechanicid}' LIMIT 1;");
    $num = mysqli_num_rows($result);
    if($num == 0){
        echo "true";
    } else {
        echo "false";
    }
    mysqli_close($check);
?>