<?php
	session_start();
	require('db-config.php');
	include_once('function.php');

	// logout action
	if($_GET['action'] == 'logout'){
		// TODO: remove the secret key from the DB
		
		// destroy the session, unset all cookies
		session_destroy();

		unset($_SESSION['secretkey']);
		setcookie('secretkey', '', time()-999999);

		unset($_SESSION['user_id']);
		setcookie('user_id', '', time()-999999);
	}

	// begin form parser
	if($_POST['did_login']){
		// extract and sanitize
		$username = mysqli_real_escape_string($db, strip_tags($_POST['username']));
		$password = mysqli_real_escape_string($db, strip_tags($_POST['password']));
		// validate
		$valid = true;
		// username must be between 3 - 50 chars
		if(strlen($username) < 3 AND strlen($username) > 50){
			$valid = false;
		}
		// password must be at least 8 chars
		if(strlen($password) < 6){
			$valid = false;
		}
		// if valid, look them up in the db, then log them in
		// sha1 is a hash algorithm
		if($valid){
			$query = "SELECT user_id, is_admin
					  FROM users
					  WHERE username = '$username'
					  AND password = sha1('$password')
					  LIMIT 1";
			$result = $db->query($query);
			if(!$result){
				echo $db->error;
			}
			// if one row is found, SUCCESS! log them in for 1 week
			if($result->num_rows == 1){
				// success
				$secretkey = sha1(microtime() . 'qzaw789sx3467edcrtg6buyhnj234miok423pl');
				setcookie('secretkey', $secretkey, time() + 60 * 60 * 24 * 7);
				$_SESSION['secretkey'] = $secretkey;

				// get the user id out of the result
				$row = $result->fetch_assoc();
				$user_id = $row['user_id'];

				// store the user_id on their computer
				setcookie('user_id', $user_id, time() + 60 * 60 * 24 * 7);
				$_SESSION['user_id'] = $user_id;

				// store the key in the DB
				$query = "UPDATE users
						  SET secret_key = '$secretkey'
						  WHERE user_id = $user_id
						  LIMIT 1";
				$result = $db->query($query);
				if(!$result){
					die($db->error);
				} else {
					// redirect to admin panel
					header('Location:admin/');
				}
			} else {
				// error
				$message = 'Your login info is incorrect, try again.';
			}
		} else {
			// error
			$message = 'Your login info is invalid, try again.';
		} // end if valid
	} // end form parser
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log In to your account</title>
	<link rel="stylesheet" type="text/css" href="admin/admin-styles.css">
</head>
<body class="login">
	<h1>Log In</h1>
	<?php
		if(isset($message)){
			echo $message;
		}
	?>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<label>Username:</label>
		<input type="text" name="username">

		<label>Password:</label>
		<input type="text" name="password">

		<input type="submit" value="Log In">
		<input type="hidden" name="did_login" value="1">
	</form>
</body>
</html>