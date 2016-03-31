<?php
  session_start();
  require('db_config.php');

  $thisTitle = "Login";
  $thisPage = "dLogin";

  // form parser
  if($_POST['did_login']){
  	// extract form info
  	$username = mysqli_real_escape_string($db, strip_tags($_POST['username']));
  	$password = mysqli_real_escape_string($db, strip_tags($_POST['password']));
  	// validate
  	$valid = true;
  	// username requirements (3 - 30 chars)
  	if(strlen($username) < 3 AND strlen($username) > 30){
  		$valid = false;
  	}
  	// password requirements (6 char. minimum)
  	if(strlen($password) < 6){
  		$valid = false;
  	}

  	// login if valid
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
  		// login if row found
  		if($result->num_rows == 1){
  			// success
  			$secretkey = sha1(microtime() . '6qwd546q5wd4qw6d4q6w54ddqw564wdq546');
  			setcookie('secretkey', $secretkey, time() + 60 * 60 * 24 * 30);
  			$_SESSION['secretkey'] = $secretkey;

  			// grab user id
  			$row = $result->fetch_assoc();
  			$user_id = $row['user_id'];

  			// store user_id on their PC
  			setcookie('user_id', $user_id, time() + 60 * 60 * 24 * 30);
  			$_SESSION['user_id'] = $user_id;

  			// store key in DB
  			$query = "UPDATE users
  					  SET secret_key = '$secretkey'
  					  WHERE user_id = $user_id
  					  LIMIT 1";
  			$result = $db->query($query);
  			if(!$result){
  				die($db->error);
  			} else {
  				// go to admin panel
  				header('Location:admin/');
  			}
  		} else {
  			$message = 'Your login information is incorrect, please try again.';
  		} // end login
  	} else {
  		$message = 'Your login information is invalid, please try again.';
  	} // end if valid
  } // end form parser

  // logout
  if($_GET['action'] == 'logout'){
  	// remove session and cookies
  	session_destroy();

  	unset($_SESSION['secretkey']);
  	setcookie('secretkey', '', time()-999999999999);

  	unset($_SESSION['user_id']);
  	setcookie('user_id', '', time()-999999999999);
  }
?>

<?php include('header.php'); ?>

<main>
	<section>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<h2>Login Here!</h2>

			<?php if(isset($message)){ ?>
					<h3><?php echo $message; ?></h3>
			<?php } ?>	
			

			<label>Username:</label>
			<input type="text" name="username" placeholder="Username...">

			<label>Password:</label>
			<input type="password" name="password">

			<a href="#">Forgot your username or password?</a>
			<input type="submit" value="Submit">
			<input type="hidden" name="did_login" value="1">
		</form>
	</section>
</main>

<?php include('footer.php'); ?>