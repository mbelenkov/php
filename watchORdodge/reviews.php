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
  	$query_movie = "SELECT movie_id, title, release_date, description, critic_rating, user_rating, moviepic
  			  FROM movies
  			  WHERE movies.movie_id = $movie_id
  			  LIMIT 1";
  	$result_movie = $db->query($query_movie);
  	if(!$result_movie){
  			echo $db->error;
  	}

	if($result_movie->num_rows >= 1){
		$row_movie = $result_movie->fetch_assoc();
?>	
	<section class="movie-info cf">
		<h2><?php echo $row_movie['title']; ?></h2>
		<img src="<?php echo ROOT_URL . '/movie_pics/thumb/' . $row_movie['movie_id'] . '.jpg'; ?>" alt="<?php echo $row_movie['title']; ?>">

		<section>
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
		</section>
	</section>
<?php	
	} else { // end if movie exists
		echo '<h2>No such movie exists in our database.</h2>';
	}
?>
</section>

<section class="cf">
	<section class="critic-reviews cf">
		<?php
			$query_critics_avg = "SELECT users.user_id, reviews.user_id, AVG(reviews.rating) as critic_rating
								  FROM reviews, users
								  WHERE reviews.movie_id = $movie_id
								  AND reviews.user_id = users.user_id
								  AND users.is_critic = 1";
			$result_critics_avg = $db->query($query_critics_avg);
			if(!$result_critics_avg){
				echo $db->error;
			}
			if($result_critics_avg->num_rows >= 1){
			$row_critics_avg = $result_critics_avg->fetch_assoc();
		?>
		<div>
			<h2>CRITIC AVERAGE <br><span class="average-rating"><?php echo round($row_critics_avg['critic_rating']); ?></span></h2>
		</div>
		<?php 
			}
		?>

		<h3>Critic Reviews:</h3>
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
		<article>
			<h4><a href="profiles.php?user_id=<?php echo $row_critics['user_id']; ?>"><?php echo $row_critics['username']; ?></a></h4>
			<!-- <a href="profiles.php?user_id=<?php //echo $row_critics['user_id']; ?>"><img src="#" alt="userpic"></a> -->
			<h4><?php echo round($row_critics['rating']); ?></h4>
			<p><?php echo $row_critics['body']; ?></p>
		</article>
		<?php
				} // end while loop
			} else {
				echo "<h4>No Critic Reviews.</h4>";
			}
		?>
	</section>

	<section class="user-reviews cf">
		<?php
			$query_users_avg = "SELECT users.user_id, reviews.user_id, AVG(reviews.rating) as users_rating
								  FROM reviews, users
								  WHERE reviews.movie_id = $movie_id
								  AND reviews.user_id = users.user_id
								  AND users.is_critic = 0";
			$result_users_avg = $db->query($query_users_avg);
			if(!$result_users_avg){
				echo $db->error;
			}
			if($result_users_avg->num_rows >= 1){
			$row_users_avg = $result_users_avg->fetch_assoc();
		?>
		<div>
			<h2>USER AVERAGE <br><span class="average-rating"><?php echo round($row_users_avg['users_rating']); ?></span></h2>
		</div>
		<?php 
			}
		?>

		<h3>User Reviews:</h3>
		<?php 
			$query_users = "SELECT users.user_id, users.username, users.userpic, users.is_critic, reviews.body, reviews.movie_id, reviews.rating, reviews.user_id
							  FROM users, reviews
							  WHERE reviews.user_id = users.user_id
							  AND reviews.movie_id = $movie_id
							  AND users.is_critic = 0
							  ORDER BY date DESC";
			$result_users = $db->query($query_users);
			if(!$result_users){
				echo $db->error;
			}
			if($result_users->num_rows >= 1){
				while($row_users = $result_users->fetch_assoc()){
		?>

		<article>
			<h4><a href="profiles.php?user_id=<?php echo $row_users['user_id']; ?>"><?php echo $row_users['username']; ?></a></h4>
			<!-- <a href="profiles.php?user_id=<?php //echo $row_users['user_id']; ?>"><img src="#" alt="userpic"></a> -->
			<h4><?php echo round($row_users['rating']); ?></h4>
			<p><?php echo $row_users['body']; ?></p>
		</article>
		<?php
				} // end while loop
			} else {
				echo "<h4>No User Reviews.</h4>";
			}
		?>
	</section>
</section>
<section class="review-movie">
	<?php
		$user_id = $_COOKIE['user_id'];

		if($_POST['did_review']){
			// extract and sanitize review
			$body = mysqli_real_escape_string($db, $_POST['body']);
			$rating = mysqli_real_escape_string($db, $_POST['rating']);
			// validate
			$valid = true;
			// body can't be black
			if($rating == '' OR $body == ''){
				$valid = false;
				$errors[] = 'A body and rating is required in order for your review to be submitted.';
			} else if ($user_id == 0){
				$valid = false;
				$errors[] = 'You have to be signed in to review.';
			}
			// if valid, add to DB
			if($valid){
				$query_review = "INSERT INTO reviews
								 (user_id, date, rating, body, movie_id)
								 VALUES
								 ('$user_id', now(), '$rating', '$body', '$movie_id')";
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

        <?php //show feedback if the form was submitted
        if( $_POST['did_review'] ){
            echo '<div class="feedback ' . $status . '">';
            echo $message;
            
            //if there are little errors, show them in a list
            if(! empty($errors)){
                echo '<ul>';
                foreach( $errors as $item ){
                    echo '<li>' .  $item . '</li>';
                }
                echo '</ul>';
            }

            echo '</div>';
        } ?>
		<form action="<?php echo 'reviews.php?movie_id=' . $movie_id; ?>" method="post">
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
			<input class="button" type="submit" value="Save Review">
			<input type="hidden" name="did_review" value="1">
		</form>
</section>
</main>

<?php include('footer.php'); ?>