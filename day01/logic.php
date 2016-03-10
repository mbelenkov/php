<?php
// value could be success or error
$status = 'error';

// change the message based on the status
if($status == 'success'){
	$message = 'Thank for your order, it is on its way!';
} else {
	$message = 'Something went wrong, please call customer service.';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Logic</title>
	<style type="text/css">
	.error{
		color: crimson;
	}
	.success{
		color: #FFF;
	}
	.message{
		background: rgba(0,0,0,.3);
		padding: 5px;
		font-family: sans-serif;
		font-weight: bold;
	}
	</style>
</head>
<body>
	<section class="<?php echo $status; ?> message">
		<?php echo $message; ?>
	</section>
</body>
</html>