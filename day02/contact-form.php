<?php 
// extract the data into easy variables
$services_needed = $_POST['services'];
$price = 10000;
$total = $price * count($services_needed);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Contact Me!</title>
	<style type="text/css">
		input {
			margin-right: 30px;
		}
	</style>
</head>
<body>
	<p>Thank you for contacting me about

	<?php 
		echo implode(', ', $services_needed);
	?>

	. It will cost you 
	
	<?php 
		echo number_format($total);
	?>

	Dollars.</p>

	<form action="contact-form.php" method="post">
		<h1>Check all services that apply:</h1>
		
		<label>Web Design</label>
		<input type="checkbox" name="services[]" value="web design">

		<label>SEO</label>
		<input type="checkbox" name="services[]" value="seo">

		<label>Brand Identity</label>
		<input type="checkbox" name="services[]" value="brand identity">

		<label>Video Production</label>
		<input type="checkbox" name="services[]" value="video production">

		<label>3D Modeling</label>
		<input type="checkbox" name="services[]" value="3d modeling">

		<label>Web Development</label>
		<input type="checkbox" name="services[]" value="web development">

		<label>E-Commerce</label>
		<input type="checkbox" name="services[]" value="e-commerce">

		<label>Newsletters</label>
		<input type="checkbox" name="services[]" value="newsletters">

		<input type="submit">
	</form>
</body>
</html>