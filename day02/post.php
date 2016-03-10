<?php 
// turn off notices, since they are not really errors
error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Post method</title>
	<style type="text/css">
		input {
			display: block;
			margin: 10px 0;
		}
	</style>
</head>
<body>
	<h1>What did you eat for breakfast?</h1>

	<form action="post.php" method="post">
		<label>Name:</label>
		<input type="text" name="name" value="<?php echo $_POST['name']; ?>">

		<label>Breakfast:</label>
		<input type="text" name="breakfast" value="<?php echo $_POST['breakfast']; ?>">

		<input type="submit" value="Go!">
	</form>

	<h2>
		<?php  
			// did the user fill in their name
			if($_POST['name']){
				echo 'Good morning, ' . ucfirst($_POST['name']) . '. ';
			}

			if($_POST['breakfast']){
				echo 'Your ' . ucfirst($_POST['breakfast']) . ' sounds delicious.';
			}
		?>
	</h2>

	<!-- this is just a handy way to show the conents of an array -->
	<!-- <pre><?php print_r($_POST); ?></pre> -->
</body>
</html>