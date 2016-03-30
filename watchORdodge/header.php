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
</head>
<body id="<?php echo $thisPage; ?>">
	<div class="container">
		<header class="mainNav">
			<a href="index.php"><h1>watchORdodge</h1></a>
			<form action="search.php" method="get">
				<input class="search" type="text" name="phrase" placeholder="&#xf002; Search our site...">
			</form>
			<a href="login.php">Login</a>
			<a href="signUp.php">Sign Up</a>
			<a class="hamburger menu-link" href="#menu"><span></span></a>
		</header>

		<nav id="menu" role="navigation">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Reviews</a></li>
				<li><a href="#">Movies</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>