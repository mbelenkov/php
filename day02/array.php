<!DOCTYPE html>
<html>
<head>
	<title>Working with Arrays</title>
	<style type="text/css">
	li {
		list-style-type: none;
	}
	</style>
</head>
<body>
	<h2>Indexed Array</h2>
	<?php 
	// indexed array example
	$italian_food = array( 'spaghetti', 'pizza', 'garlic', 'lasagna');

	// sorts alphabetically
	sort($italian_food);
	// print_r($italian_food);

	// use a foreach loop to do something with each item
	echo '<ul>';
	foreach($italian_food as $item){
		echo '<li>';
		echo $item;
		echo '</li>';
	}
	echo '</ul>';

	echo 'the second item in the list is ' . $italian_food[1];
	?>

	<h2>Associative Array</h2>
	<?php 
		$groceries = array(
			'Carrots'		=> 10,
			'Milk'			=> '1 Gallon',
			'Eggs'			=> 'A Dozen',
			'Aluminum Foil'	=> '1 Box',
			'Baby Spinach'	=> '1',
		);
	?>
	<h3>Your Grocery List: <?php echo count($groceries); ?> Items</h3>
	<ul>
		<?php foreach($groceries as $name => $count){ ?>

		<li>&check; <b><?php echo $name; ?></b>: <?php echo $count; ?></li>

		<?php } // end foreach ?>
	</ul>
</body>
</html>