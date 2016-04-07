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
			<form class="nav-search" action="search.php" method="get">
				<input class="search" type="text" name="phrase" placeholder="&#xf002; Search our site...">
			</form>
			<?php
				$secretkey = $_SESSION['secretkey'];
				$user_id = $_COOKIE['user_id'];

				$query = "SELECT username
						  FROM users
						  WHERE secret_key = '$secretkey'
						  LIMIT 1";
				$result = $db->query($query);
				
				if($secretkey == ''){
					echo '<div class="nav-action-login"><a href="login.php"><i class="fa fa-sign-in"></i>
 Login</a>';
					echo '<a href="signUp.php"><i class="fa fa-user-plus"></i>
 Sign Up</a></div>';
				} else {
					while($row = $result->fetch_assoc()){
						echo '<div class="nav-action-logout"><h3>Welcome, ' . $row['username'] . '!</h3>';
					}
					echo '<a href="profiles.php?user_id=' . $user_id . '"><i class="fa fa-user"></i> Profile</a>';
					echo '<a href="login.php?action=logout"><i class="fa fa-sign-out"></i>
 Logout</a></div>';
				}
			?>
			
			<!-- <a class="hamburger menu-link" href="#menu"><span></span></a> -->
		</header>

		<nav id="menu" role="navigation">
			<ul>
				<li><a class="nHome" href="index.php">Home</a></li>
				<li><a class="nMovies" href="movies.php">Movies</a></li>
				<li><a class="nAbout" href="about.php">About</a></li>
				<li><a class="nContact" href="contact.php">Contact</a></li>
			</ul>
		</nav>