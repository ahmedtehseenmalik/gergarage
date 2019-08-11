<?php
// Include the config file
require_once './functions/config.php' ;
session_start();
unset( $_SESSION['customerid']);
unset(  $_SESSION['usertype']);
unset($_SESSION['name'] );
session_destroy();
header('Location:' . $config['url']);

 ?>