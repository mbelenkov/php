<?php
  $thisTitle = "Contact Us";
  $thisPage = "dContact";

  require('db_config.php')
?>

<?php include('header.php'); ?>

<main>
	<section>
		<h2>Contact Us</h2>
		<form>
			<label>Name:</label>
			<input type="text" name="name" placeholder="Your name">

			<label>Address:</label>
			<input type="text" name="street" placeholder="Address">
			<input type="text" name="city" placeholder="City">
			<input type="text" name="state" placeholder="State">
			<input type="text" name="zip" placeholder="Zip Code">

			<label>Reason for Contacting Us:</label>
			<select name="reason">
				<option value=""></option>
				<option value="">Account</option>
				<option value=""></option>
				<option value=""></option>
			</select>

			<label>Email:</label>
			<input type="email" name="email" placeholder="your@email.com">

			<label>Phone Number:</label>
			<input type="tel" name="phone" placeholder="999-999-9999">

			<label>Best way to reach you:</label>


			<label>Additional Information:</label>
			<textarea name="additional" placeholder="Describe your problem here."></textarea>
		</form>
	</section>
	<section>
		
	</section>
</main>

<?php include('footer.php'); ?>