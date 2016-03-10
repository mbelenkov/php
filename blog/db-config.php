<?php
// connect to the DB
$database_name	= 'maksim_blog';
$db_user 		= 'maksim_belenkov';
$db_pass		= '7nVH8prVyztH2L9z';

$db = new mysqli('localhost', $db_user, $db_pass, $database_name);

// if there was an error, kill the page
if($db->connect_errno > 0){
	die('Could not connect to the Database: ' . $db->connect_error);
}

// no close PHP!