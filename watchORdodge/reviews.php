<?php
  $movie_id = $_GET['movie_id'];
  require('db_config.php');

  $query = "SELECT movies.title, movies.release_date, movies.description, movies.critic_rating, movies.user_rating, movies.moviepic
  			FROM movies
  			WHERE movies.movie_id = $movie_id";
  $result = $db->query($query);
  if(!$result){
  		echo $db->error;
  }

  $thisTitle = $row['title'] . "Reviews";
  $thisPage = "dReviews";
?>

<?php include('header.php'); ?>

<main>
<?php
	if($result->num_rows >= 1){
		while($row = $result->fetch_assoc()){
?>

<section>
	<h2><?php echo $row['title']; ?></h2>
	<h3>Critic Rating: <?php echo $row['critic_rating']; ?>/10</h3>
	<h3>User Rating: <?php echo $row['user_rating']; ?>/10</h3>

	<h4>Genre: 
	<?php
		$query = "SELECT movie_genres.movie_id, movie_genres.genre_id, genres.genre_id, genres.genre_name
				  FROM movies, movie_genres, genres
  				  WHERE movies.movie_id = $movie_id
  				  AND movie_genres.movie_id = $movie_id
  				  AND movie_genres.genre_id = genres.genre_id ";

  		$result = $db->query($query);
  		if(!$result){
  			echo $db->error;
  		}

  		while($row = $result->fetch_assoc()){
	?>
	<a href="#"><?php echo $row['genre_name']; ?></a>
	<?php } // end genre while loop ?>
	</h4>

	<p><?php echo $row['description']; ?></p>
</section>

<?php
		} // end while loop
	$result->free();
	} else { // end if movie exists
		echo 'No such movie exists in our database.';
	}
?>
</main>

<?php include('footer.php'); ?>