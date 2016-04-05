<?php
	$thisTitle = "Search";
	$thisPage = "dSearch";

	require('db_config.php');
	include('header.php');
?>

<main>
	<h2>Search Results:</h2>
	<?php
		// what phrase was searched
		$phrase = mysqli_real_escape_string($db, $_GET['phrase']);

		// get all movies that match the phrase
		$query_movies = "SELECT title, movie_id
						 FROM movies
						 WHERE (title LIKE '%$phrase%')";

		$result = $db->query($query_movies);

	  	if(!$result){
	  		echo $db->error;
	  	}

	  	$total = $result->num_rows;
	?>
	<article>
		<h3><?php echo $total ?> Movies Matched:</h3>

		<?php while($row = $result->fetch_assoc()){ ?>

		<section>
			<h4><a href="reviews.php?movie_id=<?php echo $row['movie_id']; ?>"><?php echo $row['title']; ?></a></h4>
		</section>

		<?php } // end while loop
			$result->free();
		?>
	</article>

	<?php
		// what phrase was searched
		$phrase = mysqli_real_escape_string($db, $_GET['phrase']);

		// get all users that match the phrase
		$query_users = "SELECT username, user_id
					FROM users
					WHERE (username LIKE '%$phrase%')";

		$result = $db->query($query_users);

	  	if(!$result){
	  		echo $db->error;
	  	}

	  	$total = $result->num_rows;
	?>
	<article>
		<h3><?php echo $total ?> Users Matched:</h3>

		<?php while($row = $result->fetch_assoc()){ ?>

		<section>
			<h4><a href="profiles.php?user_id=<?php echo $row['user_id']; ?>"><?php echo $row['username']; ?></a></h4>
		</section>

		<?php } // end while loop
			$result->free();
		?>
	</article>
</main>

<?php include('footer.php'); ?>