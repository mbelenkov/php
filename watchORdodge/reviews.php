<?php
  require('db_config.php');
  $movie_id = $_GET['movie_id'];

  $query_title = "SELECT title
  				  FROM movies
  				  WHERE movie_id = $movie_id";
  $result_title = $db->query($query_title);
  if(!$result_title){
  	echo $db->error;
  }
  if($result_title->num_rows >= 1){
  	while($row_title = $result_title->fetch_assoc()){
  		$thisTitle = $row_title['title'] . " Reviews";
  	}
  } else {
	  $thisTitle = "Movie doesn't exist!";
  }
  $thisPage = "dReviews";

  include('header.php');
?>

<main>
<section>
<?php

  	$query_movie = "SELECT movies.title, movies.release_date, movies.description, movies.critic_rating, movies.user_rating, movies.moviepic, AVG(reviews.rating) AS rating
  			  FROM movies, reviews
  			  WHERE movies.movie_id = $movie_id
  			  AND reviews.movie_id = movies.movie_id
  			  LIMIT 1";
  	$result_movie = $db->query($query_movie);
  	if(!$result_movie){
  			echo $db->error;
  	}

	if($result_movie->num_rows >= 1){
		$row_movie = $result_movie->fetch_assoc();
?>

	<h2><?php echo $row_movie['title']; ?></h2>
	<h3>Critic Rating: <?php echo $row_movie['critic_rating']; ?>/10</h3>
	<h3>User Rating: <?php echo $row_movie['user_rating']; ?>/10</h3>

	<h4>Genre: 
	<?php
		$query_genre = "SELECT movie_genres.movie_id, movie_genres.genre_id, genres.genre_id, genres.genre_name
				  FROM movies, movie_genres, genres
  				  WHERE movies.movie_id = $movie_id
  				  AND movie_genres.movie_id = $movie_id
  				  AND movie_genres.genre_id = genres.genre_id";

  		$result_genre = $db->query($query_genre);
  		if(!$result_genre){
  			echo $db->error;
  		}

  		while($row_genre = $result_genre->fetch_assoc()){
	?>
	<a href="#"><?php echo $row_genre['genre_name']; ?></a>
	<?php } // end genre while loop ?>
	</h4>

	<p><?php echo $row_movie['description']; ?></p>
<?php
		
	$result->free();
	} else { // end if movie exists
		echo 'No such movie exists in our database.';
	}
?>
</section>

<section>
	<h3>Critic Reviews</h3>

	<?php 
		$query_critics = "SELECT users.user_id, users.username, users.userpic, users.is_critic, reviews.body, reviews.movie_id, reviews.rating, reviews.user_id
						  FROM users, reviews
						  WHERE reviews.user_id = users.user_id
						  AND reviews.movie_id = $movie_id
						  AND users.is_critic = 1
						  ORDER BY date DESC";
		$result_critics = $db->query($query_critics);
		if(!$result_critics){
			echo $db->error;
		}
		if($result_critics->num_rows >= 1){
			while($row_critics = $result_critics->fetch_assoc()){
	?>
	<h4><a href="profiles.php?user_id=<?php echo $row_critics['user_id']; ?>"><?php echo $row_critics['username']; ?></a></h4>
	<a href="profiles.php?user_id=<?php echo $row_critics['user_id']; ?>"><img src="#" alt="userpic"></a>
	<h4><?php echo $row_critics['rating']; ?></h4>
	<p><?php echo $row_critics['body']; ?></p>
	<?php
			} // end while loop
		} else {
			echo "<h4>No Critic Reviews.</h4>";
		}
	?>

	<h2>AVERAGE RATING <?php echo round($row_movie['rating']); ?></h2>
</section>

<section>
	<h3>User Reviews</h3>

	<?php 
		$query_users = "SELECT users.user_id, users.username, users.userpic, users.is_critic, reviews.body, reviews.movie_id, reviews.rating, reviews.user_id
						  FROM users, reviews
						  WHERE reviews.user_id = users.user_id
						  AND reviews.movie_id = $movie_id
						  AND users.is_critic = 0";
		$result_users = $db->query($query_users);
		if(!$result_users){
			echo $db->error;
		}
		if($result_users->num_rows >= 1){
			while($row_users = $result_users->fetch_assoc()){
	?>
	<h4><a href="profiles.php?user_id=<?php echo $row_users['user_id']; ?>"><?php echo $row_users['username']; ?></a></h4>
	<a href="profiles.php?user_id=<?php echo $row_users['user_id']; ?>"><img src="#" alt="userpic"></a>
	<h4><?php echo $row_users['rating']; ?></h4>
	<p><?php echo $row_users['body']; ?></p>
	<?php
			} // end while loop
		} else {
			echo "<h4>No User Reviews.</h4>";
		}
	?>

	<h2>AVERAGE RATING</h2>
</section>

<section>
	<?php
		if($_POST['did_post']){
			// extract and sanitize review
			$body = mysqli_real_escape_string($db, $_POST['body']);
			$rating = mysqli_real_escape_string($db, $_POST['rating']);
			// validate
			$valid = true;
			// body can't be black
			if($rating == '' OR $body == ''){
				$valid = false;
				$errors[] = 'A body is required in order for your review to be submitted.';
			}
			// if valid, add to DB
			if($valid){
				$query_review = "INSERT INTO reviews
								 (user_id, date, rating, body, movie_id)
								 VALUES
								 (USERID, now(), RATING, '$body', $movie_id)";
				$result_review = $db->query($query_review);
				if(!$result_review){
					echo $db->error;
				}
				// check to see if row was added
				if($db->affected_rows == 1){
					$message = 'Your review was submitted!';
				} else {
					$message = 'Sorry, your review wasn\'t submitted';
				}
			} // end if valid
		} // end parser
	?>
	<h3>Review This Movie</h3>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<input type="radio" name="rating" value="1"> 1
		<input type="radio" name="rating" value="2"> 2
		<input type="radio" name="rating" value="3"> 3
		<input type="radio" name="rating" value="4"> 4
		<input type="radio" name="rating" value="5"> 5
		<input type="radio" name="rating" value="6"> 6
		<input type="radio" name="rating" value="7"> 7
		<input type="radio" name="rating" value="8"> 8
		<input type="radio" name="rating" value="9"> 9
		<input type="radio" name="rating" value="10"> 10

		<textarea name="body"><?php echo stripslashes($body); ?></textarea>
		<input type="submit" value="Save Review">
		<input type="hidden" name="did_review" value="1">
	</form>
</section>
</main>

<?php include('footer.php'); ?>