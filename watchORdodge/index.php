<?php
  $thisTitle = "Home";
  $thisPage = "dHome";

  require('db_config.php')
?>

<?php include('header.php'); ?>

<main>
<section class="new-releases cf">
	<?php 
		$query_new_releases = "SELECT movie_id, title
							   FROM movies
							   WHERE movie_id IN(113, 114, 115)";
		$result_new_releases = $db->query($query_new_releases);
		if(!$result_new_releases){
			echo $db->error;
		}
	?>
	<h2>Releasing This Week</h2>
	<ul class="caption-style-large">
	<?php while($row_new_releases = $result_new_releases->fetch_assoc()){ ?>
		<li class="movie-icon">
			<img src="<?php echo ROOT_URL . '/movie_pics/medium/' . $row_new_releases['movie_id'] . '.jpg'; ?>" alt="<?php echo $row_new_releases['title']; ?>">
			<div class="caption">
				<a href="reviews.php?movie_id=<?php echo $row_new_releases['movie_id']; ?>">
					<div class="blur"></div>
					<div class="caption-text">
						<h3><?php echo $row_new_releases['title']; ?></h3>
					</div>
				</a>
			</div>
		</li>
	<?php } // end while loop ?>
	</ul>
</section>

<section class="popular-this-month cf">
	<?php
		$query_popular = "SELECT movies.movie_id, movies.title, reviews.rating, reviews.movie_id, reviews.date
						  FROM movies, reviews
						  WHERE movies.movie_id = reviews.movie_id
						  ORDER BY reviews.date DESC
						  LIMIT 6";
		$result_popular = $db->query($query_popular);
		if(!$result_popular){
			echo $db->error;
		}
	?>

	<h3>Newest Reviews</h3>
	<ul class="caption-style">
	<?php while($row_popular = $result_popular->fetch_assoc()){ ?>
	<li class="movie-icon">
		<img src="<?php echo ROOT_URL . '/movie_pics/thumb/' . $row_popular['movie_id'] . '.jpg'; ?>" alt="<?php echo $row_popular['title']; ?>">
		<div class="caption">
			<a href="reviews.php?movie_id=<?php echo $row_popular['movie_id']; ?>">
				<div class="blur"></div>
				<div class="caption-text">
					<h3><?php echo $row_popular['title']; ?></h3>
				</div>
			</a>
		</div>
	</li>
	<?php } // end while loop ?>
	</ul>
</section>
</main>

<?php include('footer.php'); ?>