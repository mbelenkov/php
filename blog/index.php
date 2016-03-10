<?php
	require('db-config.php');
	include_once('function.php');
	include('header.php');
?>
	<main>
		<?php
			// get the 2 most recent published posts
			$query =	"SELECT title, body, date
						 FROM posts
						 WHERE is_published = 1
						 ORDER BY date DESC
						 LIMIT 2";
			// run the query
			$result = $db->query($query);
			// check to see if posts were found
			if($result->num_rows >= 1){
			// loop through the posts that it found
		?>

		<h2>Latest Posts:</h2>

		<?php while($row = $result->fetch_assoc()){ ?>

		<article>
			<h3><?php echo $row['title']; ?></h3>
			<div class="post-meta">Posted on <?php echo nice_date($row['date']); ?></div>
			<p><?php echo $row['body']; ?></p>
		</article>

		<?php
			} //end while loop
			} else { // end if posts found
				echo 'No posts found!';
			} // end else posts found
		?>
	</main>

	<?php include('sidebar.php');
		  include('footer.php');
	?>