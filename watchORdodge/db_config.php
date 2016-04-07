<?php
// DB connection
$database_name	= 'maksim_project';
$db_user 		= 'maksim_belenkov';
$db_pass		= '7nVH8prVyztH2L9z';

$db = new mysqli('localhost', $db_user, $db_pass, $database_name);

// kills the page if an error happens
if($db->connect_errno > 0){
	die('Could not connect to the Database for the following reason: ' . $db->connect_error);
}

// databse encoding
$db->set_charset("utf8");

// hide error reporting notices
error_reporting(E_ALL & ~E_NOTICE);

// url & paths defined
//define('ROOT_URL', 'http://localhost/maxBelenkov/watchORdodge');
//define('ROOT_PATH', 'C:\XAMPP\htdocts\maxBelenkov\watchORdodge');

define('ROOT_URL', 'http://localhost/php/watchORdodge');
define('ROOT_PATH', 'D:\XAMPP\htdocs\php\watchORdodge');

session_start();
// no close PHP