<?php
require_once('config.php');

// Defining constants for theme assets 
define('theme_root', $config['url'].'theme/');
define('css', theme_root.'css/');
define('js', theme_root.'js/');
define('img', theme_root.'images/');
define('upload', theme_root.'upload/');

//Anti XSS (Cross-site Scripting)
function security($input)
{
	global $con;
    $input = mysqli_real_escape_string($con,$input);
    $input = strip_tags($input);
    $input = stripslashes($input);
    return $input;
}


?>