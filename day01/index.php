<?php
// phpinfo();
// store it
$message = 'Happy Wednesday!';
define('MY_CONSTANT', 'the value of my constant');

// how to create a custom function
function myBreakfast($food){
	echo "$food";
}
function convert_date($timestamp){
		$date = new DateTime($timestamp);
		return $date->format('l, F j, Y');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Example Page</title>
	<style type="text/css">
	h1 {
		background-color: rgba(0,0,0,.3);
		color: #FFF;
		padding: 5px;
	}
	nav.menu ul li {
		display: inline;
		background-color: rgba(0,0,0,.3);
		padding: 5px;
	}
	nav.menu ul li a {
		color: #FFF;
		text-decoration: none;
	}
	</style>
</head>
<body>

<?php include('navigation.php'); ?>

<h1><?php echo convert_date('2016-03-02'); ?></h1>

</body>
</html>