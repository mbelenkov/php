<?php
	require('db_config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $thisTitle; ?></title>
	<link rel="stylesheet" type="text/css" href="normalize.css">
	<link href='https://fonts.googleapis.com/css?family=Alegreya+Sans:400,400italic,700%7CKaushan+Script' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="alternate" type="application/rss+xml" href="rss.php">
</head>
<body id="<?php echo $thisPage; ?>">
	<div class="container">
		<header class="mainNav">
			<a href="index.php"><h1>watchORdodge</h1></a>
			<form action="search.php" method="get">
				<input class="search" type="text" name="phrase" placeholder="&#xf002; Search our site...">
			</form>
			<?php
				$secretkey = $_SESSION['secretkey'];

				$query = "SELECT username
						  FROM users
						  WHERE secret_key = '$secretkey'
						  LIMIT 1";
				$result = $db->query($query);
				
				if($secretkey == ''){
					echo '<a href="login.php">Login</a>';
					echo '<a href="signUp.php">Sign Up</a>';
				} else {
					while($row = $result->fetch_assoc()){
						echo '<h3>Welcome, ' . $row['username'] . '!</h3>';
					}
					echo '<a href="admin/index.php">Profile</a>';
					echo '<a href="login.php?action=logout">Logout</a>';
				}
			?>
			
			<a class="hamburger menu-link" href="#menu"><span></span></a>
		</header>

		<nav id="menu" role="navigation">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="movies.php">Movies</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</nav>