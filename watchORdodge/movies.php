<?php
  $thisTitle = "Movies";
  $thisPage = "dMovies";

  require('db_config.php')
?>

<?php include('header.php'); ?>

<main>
<section>
	<!-- TODO: https://mixitup.kunkalabs.com/ -->
	<input type="button" value="Ratings">
	<input type="button" value="Popularity">
	<form action="movies.php" method="get">
		<input class="search" type="text" name="phrase" placeholder="&#xf002; Search for movies...">
	</form>
</section>

<?php
	$phrase = mysqli_real_escape_string($db, $_GET['phrase']);

	if(isset($_GET['phrase'])){
		$query_movies = "SELECT title, movie_id
						 		FROM movies
						 		WHERE (title LIKE '%$phrase%')";
	} else {
		$query_movies = "SELECT movie_id, title, moviepic
							 FROM movies
							 ORDER BY title ASC";
	}
	$result = $db->query($query_movies);
	if(!$result){
		echo $db->error;
	}
?>
<article>
	<!-- TODO: http://hasinhayder.github.io/ImageCaptionHoverAnimation/index.html -->
	<ul>
	<?php while($row = $result->fetch_assoc()){ ?>
			<li>
				<img src="#" alt="#">
				<div class="caption">
					<div class="blur"></div>
					<div class="caption-text">
						<h3><a href="reviews.php?movie_id=<?php echo $row['movie_id']; ?>"><?php echo $row['title']; ?></a></h3>
					</div>
				</div>
			</li>
	<?php } // end while loop ?>
	</ul>
</article>
</main>

<?php include('footer.php'); ?>