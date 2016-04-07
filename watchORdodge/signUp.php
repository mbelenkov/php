<?php
  session_start();
  require('db_config.php');

  $thisTitle = "Sign Up";
  $thisPage = "dSignUp";

  // form parser
  if($_POST['did_register']){
  	$is_critic = filter_var($_POST['is_critic'], FILTER_SANITIZE_NUMBER_INT);
  	$username = mysqli_real_escape_string($db, strip_tags($_POST['username']));
  	$password = mysqli_real_escape_string($db, strip_tags($_POST['password']));
  	$email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
  	$policy = filter_var($_POST['policy'], FILTER_SANITIZE_NUMBER_INT);
  	$valid = true;

  	// username validation
  	if(strlen($username) < 6 OR strlen($username) > 30){
  		$valid = false;
  		$errors['username'] = 'Choose a username that is between 6 to 30 characters long.';
  	} else {
  		// check to see if it's taken
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
  			$errors['username'] = 'Sorry, that username is already taken. Try a different one.';
  		}
  	} // end username validation

  	// password validation
  	if(strlen($password) < 6){
  		$valid = false;
  		$errors['password'] = 'Your password is to short. It must be at least 6 characters long.';
  	} // end password validation

  	// email validation
  	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  		$valid = false;
  		$errors['email'] = 'Please provide a valid email address.';
  	} else {
  		// check to see if it's taken
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
  			$errors['email'] = 'That email address is already registered to an account.';
  		}
  	} // end email validation

  	// policy validation
  	if($policy != 1){
  		$valid = false;
  		$errors['policy'] = 'You must agree to the ferms of service and the privacy policy before signing up.';
  	} // end policy validation

  	if($valid){
  		// generate secret key
  		$secretkey = sha1(microtime() . 'asd564d56a4sasd564das56asd546das546');

  		// add to DB
  		$query = "INSERT INTO users
  				  (username, email, password, date_joined, is_admin, is_critic, secret_key)
  				  VALUES
  				  ('$username', '$email', sha1('$password'), now(), 0, '$is_critic', '$secretkey')";
  		$result = $db->query($query);
  		if($db->affected_rows == 1){
  			$message = 'You are now a registered user.';
  		} else {
  			$message = 'Something went wrong during account creation.';
  		}
  	}
  } // end form parser
?>

<?php include('header.php'); ?>

<main>
	<section class="signup-box">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
			<h2>Register Here!</h2>

			<?php
				if($_POST['did_register']){
					echo '<section class="feedback">';
					if(isset($message)){
						echo '<h3>' . $message . '</h3>';
					}
					if(!empty($errors)){
						echo '<ul class="errors">';
						foreach($errors as $error){
							echo '<li>' . $error . '</li>';
						}
						echo '</ul>';
					}
					echo '</section>';
				}
			?>

			<label class="notSwitch">Account Type:</label>
			<div class="onoffswitch">
		      <input type="checkbox" name="is_critic" value="1" class="onoffswitch-checkbox" id="myonoffswitch">
		      <label class="onoffswitch-label" for="myonoffswitch">
		          <span class="onoffswitch-inner"></span>
		          <span class="onoffswitch-switch"></span>
		      </label>
		  </div>


			<label class="notSwitch">Username:</label>
			<input class="notSwitch" type="text" name="username" value="" placeholder="6 - 30 Characters">

			<label class="notSwitch">Password:</label>
			<input class="notSwitch" type="password" name="password" value="" placeholder="6 Characters minimum">

			<label class="notSwitch">Email:</label>
			<input class="notSwitch" type="email" name="email" placeholder="you@mail.com">

			<label class="checkbox">
				<input type="checkbox" name="policy" value="1">
				I agree to the <a href="tos.php" target="new">terms of service</a> and <a href="privacyPolicy.php" target="new">privacy policy</a>.
			</label>

			<input class="button notSwitch" type="submit" value="Sign Up">
			<input type="hidden" name="did_register" value="1">
		</form>
	</section>
</main>

<?php include('footer.php'); ?>