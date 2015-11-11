<?php

if(!defined('INCLUDE_CHECK')) die('You are not allowed to execute this file directly');


/* Database config */

$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= 'root';
$db_database	= 'tz_member'; 


define( "DB_HOST", "localhost");
define( "DB_USER", "root");
define( "DB_PASS", "root");
define( "DB_NAME", "tz_member");
/* End config */



$link = @mysql_connect($db_host,$db_user,$db_pass) or die('Unable to establish a DB connection');
//$link = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
mysql_select_db($db_database,$link);
mysql_query("SET names UTF8");

?>
