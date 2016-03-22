<?php
	session_start();
	require('db-config.php');
	include_once('function.php');
	// parse the form
	if($_POST['did_register']){
		// sanitize
		$username = mysqli_real_escape_string($db, strip_tags($_POST['username']));
		$email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
		$password = mysqli_real_escape_string($db, strip_tags($_POST['password']));
		$policy = filter_var($_POST['policy'], FILTER_SANITIZE_NUMBER_INT);
		// validate
		$valid = true;

		// username is not within 5 - 50 chars
		if(strlen($username) < 3 OR strlen($username) > 50){
			$valid = false;
			$errors['username'] = 'Choose a username that is between 3 - 50 characters long.';
		} else {
			// if it passed the length check, check if the username is already taken
			$query = "SELECT username
					  FROM users
					  WHERE username = '$username'
					  LIMIT 1";
			$result = $db->query($query);
			if(!$result){
				echo $db->error;
			}
			if($result->num_rows == 1){
				$valid = false;
				$errors['username'] = 'Sorry, that username is already taken. Try another.';
			}
		} // end of username tests

		// email is invalid or blank
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$valid = false;
			$errors['email'] = 'Please provide a valid email address, like bob@mail.com.';
		} else {
			// email is already taken
			$query = "SELECT email
					  FROM users
					  WHERE email = '$email'
					  LIMIT 1";
			$result = $db->query($query);
			if(!$result){
				echo $db->error;
			}
			if($result->num_rows == 1){
				$valid = false;
				$errors['email'] = 'That email address is already registered with an account.';
			}
		}

		// password is too short
		if(strlen($password) < 8){
			$valid = false;
			$errors['password'] = 'Your password is to short. It must be 8 characters long or more.';
		}

		// policy box is not checked
		if($policy != 1){
			$valid = false;
			$errors['policy'] = 'You must agree to the terms of service before signing up.';
		}
		// if valid, log them in and store user info in DB
		if($valid){
			// generate the secret key
			$secretkey = sha1(microtime() . 'asdljksdkl;gdfj1029857348jh;l');

			// add user to DB
			$query = "INSERT INTO users
					  (username, password, email, date_joined, is_admin, secret_key)
					  VALUES
					  ('$username', sha1('$password'), '$email', now(), 0, '$secretkey')";
			$result = $db->query($query);
			// check to make sure 1 row was added
			if($db->affected_rows == 1){
				// success!
				$message = 'You are now a registered user. Please <a href="login.php">log in</a>.';

				// log them in automatically
				// get their new user id
				$user_id = $db->insert_id;
				setcookie('user_id', $user_id, time()+60*60*24*7);
				$_SESSION['user_id'] = $user_id;

				setcookie('secretkey', $secretkey, time()+60*60*24*7);
				$_SESSION['secretkey'] = $secretkey;

				// redirect
				header('Location:admin/');
			} else {
				// db error
				$message = 'Something went wrong during account creation, sorry.';
			}
		} // end if valid
	} // end parser
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up for an Account</title>
	<link rel="stylesheet" type="text/css" href="admin/admin-styles.css">
</head>
<body class="login">
	<h1>Sign up to comment</h1>

	<?php
	if($_POST['did_register']){
		echo '<div class="feedback">';
		// show user feedback if it exists
		if(isset($message)){
			echo $message;
		}
		// show errors as a list
		if(!empty($errors)){
			echo '<ul>';
			foreach($errors as $error){
				echo '<li>' . $error . '</li>';
			}
			echo '</ul>';
		}
		echo '</div>';
	}
	?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<label>Create a Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>" <?php field_error($errors['username']); ?>>
		<span class="hint">Between 3 - 50 characters</span>

		<label>Your Email Address</label>
		<input type="email" name="email" placeholder="you@email.com" value="<?php echo $email; ?>" <?php field_error($errors['email']); ?>>

		<label>Input a password</label>
		<input type="password" name="password" value="<?php echo $password; ?>" <?php field_error($errors['password']); ?>>
		<span class="hint">At least 8 characters long</span>

		<label <?php field_error($errors['policy']); ?>>
			<input type="checkbox" name="policy" value="1" <?php echo $policy == 1? 'checked':''; ?>>
			I agree to the <a href="#" target="_blank">terms of service and privacy policy</a>.
		</label>

		<input type="submit" value="Sign Up">
		<input type="hidden" name="did_register" value="1">
	</form>
</body>
</html>