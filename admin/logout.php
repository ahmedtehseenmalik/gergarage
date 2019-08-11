<?php
// Include the config file
require_once './functions/config.php' ;
session_start();
unset( $_SESSION['userid']);
unset(  $_SESSION['usertype']);
session_destroy();
header('Location:' . $config['url']);

 ?>