<?php
// open or resume current session
session_start();
// hide notices
error_reporting(E_ALL & ~E_NOTICE);

// parse the form if they submitted it
if($_POST['did_login']){
	// extract the submitted data
	// check to see if their credentials are correct. if so, log them in
	$username = $_POST['username'];
	$password = $_POST['password'];

	// TEMPORARY! fake correct credentials. these will be replaced with database stuff later
	$correct_username = "max";
	$correct_password = "maksim";

	// check to see if their credentials are correct. if so, log them in
	if($username === $correct_username AND $password === $correct_password){
		// success
		// remember that the user is logged in for 1 week
		setcookie('loggedin', true, time() + 60 * 60 * 24 * 7);
		$_SESSION['loggedin'] = true;
		// refresh the page
		header("Refresh:0");
		// redirect to the secret page
		header("Location:secret.php");
		$message = 'You are now logged in!';
	} else {
		// error
		$message = 'Your username and password combo is incorrect.';
	}
} // end of form parser

// if the user returns with a valid cookie, re-create the session
if ($_COOKIE['loggedin']){
	$_SESSION['loggedin'] = true;
}

// if the user is trying to log out, get rid of the cookies and session
if($_GET['action'] == 'logout'){
	// close the open session
	session_destroy();
	// erase all session variables (blank array)
	$_SESSION = array();

	// set any cookies to null, and make them expire in the past
	setcookie('loggedin', '', time()-99999);
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login to access secret content</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<?php
		if($_SESSION['loggedin']){
			echo '<h1>You are logged in with a session and a cookie.</h1>';
		} else {
	?>
	<h1>Log in to your account</h1>
	<?php // show the message if it exists
		if(isset($message)){
			echo $message;
		}
	?>
	<form action="login.php" method="post">
		<label for="the_username">Username:</label>
		<input type="text" name="username" id="the_username">

		<label for="the_password">Password:</label>
		<input type="password" name="password" id="the_password">

		<input type="submit" value="Log In">
		<!-- trigger for the form parser at the top of the page -->
		<input type="hidden" name="did_login" value="true">
	</form>
	<?php } ?>
</body>
</html>