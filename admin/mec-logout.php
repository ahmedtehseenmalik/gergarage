<?php
// Include the config file
require_once './functions/config.php' ;
session_start();
unset( $_SESSION['mechaniclogin']);
unset(  $_SESSION['usertype']);
unset($_SESSION['name'] );
session_destroy();
header('Location:' . $config['url']);

 ?>