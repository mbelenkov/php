<?php
	error_reporting(E_ALL & ~E_NOTICE);
	// parse the form if the user submitted it
	if($_POST['did_send'] == true){
		// extract the user submitted data
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$reason = $_POST['reason'];
		$message = $_POST['message'];
		$newsletter = $_POST['newsletter'];
		// todo: sanitize and validate all the data
		if($newsletter == ''){
			$newsletter = 'Hell no.';
		}

		// setup the parts of the mail() function
		$to = 'mbelenkov1227@gmail.com';
		$subject = "$name just reached to you via your website.";
		$body  = "Email: $email \n";
		$body .= "Name: $name \n";
		$body .= "Phone: $phone \n";
		$body .= "Reason for contacting you: $reason \n\n";

		$body .= "Subscribe? $newsletter \n\n";

		$body .= "Message: $message";

		$header  = 'From: Maksim <contact@maksimbelenkov.com> \r\n';
		$header .= "Reply-to: $email";

		// send the mail
		$did_mail = mail($to, $subject, $body, $header);

		// user feedback message
		if($did_mail){
			$feedback = "Thank you for contacting us, $name.";
			$status = 'success';
		}else{
			$feedback = "Sorry, your message could not be sent. Try again.";
			$status = 'error';
		}
	} // end of parser
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Us</title>
	<style type="text/css">
		* {
			box-sizing: inherit;
		}
		html {
			height: 100%;
			background: aqua;
			box-sizing: border-box;
		}
		body {
			font-family: Calibri, arial, sans-serif;
			width: 95%;
			max-width: 500px;
			margin: 1em auto;
			background: #F2F2F2;
			padding: 1em;
		}
		label {
			display: block;
			margin: 1em 0 .5em;
		}
		input,
		textarea {
			display: block;
			width: 100%;
			padding: .3em;
		}
		input[type="checkbox"]{
			display: inline;
			width: auto;
			padding: 0;
		}
		/*feedback*/
		.message {
			background-color: #000;
			padding: 1em;
		}
		.success .message {
			background-color: lightgreen;
		}
		.error .message {
			background-color: lightsalmon;
		}
	</style>
</head>
<body class="<?php echo $status; ?>">
	<h1>Contact Us</h1>
	<p>Please take a moment to get in touch. We will get back to you shortly.</p>

	<?php //display user feedback if it exists
		if(isset($message)){
			echo '<div class="message">';
			echo $feedback;
			echo '</div>';
		}
	?>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="the_name">Your Name:</label>
		<input type="text" name="name" id="the_name" value="<?php echo $name; ?>">

		<label for="the_email">Your Email:</label>
		<input type="email" name="email" id="the_email" value="<?php echo $email; ?>">

		<label for="the_phone">Phone Number:</label>
		<input type="tel" name="phone" id="the_phone" value="<?php echo $phone; ?>">

		<label for="the_reason">How can I help you?</label>
		<select name="reason" id="the_reason">
			<option>Choose one:</option>
			<option value="customer service" <?php if($reason == 'customer service'){echo 'selected';} ?>>I need customer service</option>
			<option value="hi" <?php if($reason == 'hi'){echo 'selected';} ?>>I just want to say "Hi"</option>
			<option value="bug" <?php if($reason == 'bug'){echo 'selected';} ?>>I found a bug in your software</option>
		</select>

		<label for="the_message">Your Message:</label>
		<textarea name="message" id="the_message"><?php echo $message; ?></textarea>

		<label>
			<input type="checkbox" 
			name="newsletter" 
			value="yes"
			<?php if($newsletter != 'Hell no.'){echo 'checked';} ?>>
			Subscribe to our newsletter
		</label>

		<input type="submit" value="Send Message">
		<input type="hidden" name="did_send" value="true">
	</form>

	<pre><?php echo $body; ?></pre>
</body>
</html>