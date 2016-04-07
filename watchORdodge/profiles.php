<?php
  require('db_config.php');
  $user_id_query = $_GET['user_id'];

  $query_username = "SELECT username
  				  	 FROM users
  				  	 WHERE user_id = $user_id_query";
  $result_username = $db->query($query_username);
  if(!$result_username){
  	echo $db->error;
  }
  if($result_username->num_rows >= 1){
  	while($row_username = $result_username->fetch_assoc()){
  		$thisTitle = $row_username['username'] . "'s Profile";
  	}
  } else {
	  $thisTitle = "This profile doesn't exist!";
  }

  $thisPage = "dProfile";

  include('header.php');
?>

<main>
	<?php 
		$query_info = "SELECT username, userpic, date_joined, bio, is_critic, is_admin
					   FROM users
					   WHERE user_id = $user_id_query";
		$result_info = $db->query($query_info);
		if(!$result_info){
			echo $db->error;
		}
	?>
	<section>
		<?php
			if($result_info->num_rows >= 1){
				while($row_info = $result_info->fetch_assoc()){
		?>
		<h2><?php echo $row_info['username']; ?>'s Profile</h2>
		<!-- <img src="#" alt="userpic"> -->
		<h4>Date Joined: <?php echo $row_info['date_joined']; ?></h4>
		<h3>Bio</h3>
		<p><?php echo $row_info['bio']; ?></p>
	</section>

	<section>
		<h3>This Users Reviews:</h3>
		<?php 
			$query_reviews = "SELECT reviews.date, reviews.rating, reviews.body, movies.title, movies.moviepic, movies.movie_id
							  FROM reviews, movies
							  WHERE reviews.user_id = $user_id_query
							  AND reviews.movie_id = movies.movie_id";
			$result_reviews = $db->query($query_reviews);
			if(!$result_reviews){
				echo $db->error;
			}
				while($row_reviews = $result_reviews->fetch_assoc()){
		?>
		<h4><a href="<?php echo 'reviews.php?movie_id=' . $row_reviews['movie_id'] ?>"><?php echo $row_reviews['title']; ?></a></h4>
		<a href="<?php echo 'reviews.php?movie_id=' . $row_reviews['movie_id'] ?>"><img src="<?php echo ROOT_URL . '/movie_pics/thumb/' . $row_reviews['movie_id'] . '.jpg'; ?>" alt="moviepic"></a>
		<h5><?php echo $row_reviews['date']; ?></h5>
		<h2><?php echo $row_reviews['rating']; ?></h2>
		<p><?php echo $row_reviews['body']; ?></p>
		<?php } // end review loop ?>

		<?php
				} // end while loop
			} else { // end if account exists
				echo '<h2>This profile doesn\'t exist!</h2>';
			}
		?>
	</section>
</main>

<?php include('footer.php'); ?>