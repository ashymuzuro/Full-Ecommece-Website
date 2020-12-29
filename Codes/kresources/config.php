<?php
//output buffing
ob_start();
//session starting
session_start();



//************************************************************************
//(i)session ending "by the way there are predefined in the system" 
//(ii)usually used for debugging  purposes
//NOTE:BE CAREFUL WITH THIS FUNCTION
//session_destroy();
//************************************************************************



//########################################################
//files information
defined("DS")?null:define("DS",DIRECTORY_SEPARATOR);
defined('TEMPLATE_FRONT')?null:define('TEMPLATE_FRONT',__DIR__.DS.'ktemplates\frontend');
defined('TEMPLATE_BACK')?null:define('TEMPLATE_BACK',__DIR__.DS.'ktemplates\backend');
defined('UPLOAD_DIRECTORY')?null:define('UPLOAD_DIRECTORY',__DIR__.DS.'uploads');

//########################################################

//########################################################
//database information
defined("DB_HOST")?null:define("DB_HOST","localhost");
defined("DB_USER")?null:define("DB_USER","root");
defined("DB_PASS")?null:define("DB_PASS","");
defined("DB_NAME")?null:define("DB_NAME","ecom_db");
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
require_once("functions.php");
require_once("cart.php");
//########################################################

?>