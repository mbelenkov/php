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

// set encoding to utf-8
$db->set_charset("utf8");

// error reporting: hide notices
error_reporting(E_ALL & ~E_NOTICE);

// define some url/path constants so it makes linking to stuff easier
// URL is for href, src and other HTML stuff
// PATH is for includes and other PHP stuff
define('ROOT_URL', 'http://localhost/maxBelenkov/blog');
define('ROOT_PATH', 'C:\xampp\htdocs\maxBelenkov\blog');

// no close PHP!