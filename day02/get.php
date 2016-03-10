<?php 
// turn off notices, since they are not really errors
error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Get method</title>
	<style type="text/css">
		input {
			display: block;
			margin: 10px 0;
		}
	</style>
</head>
<body>
	<h1>What did you eat for breakfast?</h1>

	<form action="get.php" method="get">
		<label>Name:</label>
		<input type="text" name="name" value="<?php echo $_GET['name']; ?>">

		<label>Breakfast:</label>
		<input type="text" name="breakfast" value="<?php echo $_GET['breakfast']; ?>">

		<input type="submit" value="Go!">
	</form>

	<h2>
		<?php  
			// did the user fill in their name
			if($_GET['name']){
				echo 'Good morning, ' . ucfirst($_GET['name']) . '. ';
			}

			if($_GET['breakfast']){
				echo 'Your ' . ucfirst($_GET['breakfast']) . ' sounds delicious.';
			}
		?>
	</h2>
</body>
</html>