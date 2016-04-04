<?php
	require('db-config.php')
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Example AJAX Implementation</title>
	<link rel="stylesheet" type="text/css" href="ajax-demo.css">
</head>
<body>
	<h2>Read all posts in a category</h2>

	<?php
		$query = "SELECT * FROM categories";
		$result = $db->query($query);
		if(!$result){
			echo $db->error;
		}
	?>

	<select class="picker">
		<option value="0">Choose a category</option>

		<?php while( $row = $result->fetch_assoc()){ ?>
		<option value="<?php echo $row['category_id']; ?>">
			<?php echo $row['name']; ?>
		</option>
		<?php } ?>
	</select>

	<div class="display-area">Pick a category to view the posts.</div>

	<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<script>
		$('.picker').change(function(){
			// get the value
			var cat_id = this.value;
			// make a request to ajax-response.php
			$.ajax({
				method: 'GET',
				url: 'ajax-response.php',
				data: {'cat_id' : cat_id},
				dataType: 'html', // expect HTML in response
				success: function(response){
					$('.display-area').html(response);
				}
			});
		});

		// listen for the AJAX events (add some user feedback during the request)
		$(document).on({
			ajaxStart : function(){$("body").addClass('loading');},
			ajaxStop : function(){$("body").removeClass('loading');}
		});
	</script>
</body>
</html>