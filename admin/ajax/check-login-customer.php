<?php
// Include functions.php for database connection variable
require_once('../functions/functions.php');
session_start();
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($check,$_POST['user']);
    $pass = md5(mysqli_real_escape_string($check,$_POST['pass']));
    $sql = mysqli_query($check,"SELECT * FROM `customer` WHERE `username` = '{$username}' AND `password` = '{$pass}'");
    if(mysqli_num_rows($sql) > 0){
               $fet_r = mysqli_fetch_assoc($sql);
            
               $_SESSION['customerid'] = $fet_r['customer_id'];
               $_SESSION['usertype'] = 'customer';
                $_SESSION['name'] = $fet_r['first_name'];
         
       
  
          // echo $_SESSION['userid'];
       
   
}else{
  echo 'error';
}
}
?>