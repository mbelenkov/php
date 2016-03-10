<?php
	session_start();
	// password protect this page. redirect to login if not logged in
	if(!$_SESSION['loggedin']){
		header('Location:login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Secret Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		html {
			background: url('img/img2.gif');
			background-size: contain;
			text-align: center;
		}
	</style>
</head>
<body>
	<h1>You are on the secret page!</h1>
	<a href="login.php?action=logout">Log Out</a>
</body>
</html>