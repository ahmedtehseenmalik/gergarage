<?php
// Include functions.php for database connection variable
require_once('../functions/functions.php');
session_start();
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($check,$_POST['user']);
    $pass = md5(mysqli_real_escape_string($check,$_POST['pass']));
    $sql = mysqli_query($check,"SELECT * FROM `user` WHERE `username` = '{$username}' AND `password` = '{$pass}'");
    if(mysqli_num_rows($sql) > 0){
               $fet_r = mysqli_fetch_assoc($sql);
            
                    $_SESSION['userid'] = $fet_r['user_id'];
                    $_SESSION['usertype'] = $fet_r['type'];
              
            
  
          // echo $_SESSION['userid'];
       
   
}else{
  echo 'error';
}
}
?>