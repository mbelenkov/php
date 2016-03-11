<?php
	require('db-config.php');
	include_once('function.php');
	include('header.php');
?>
	<main>
		<?php
			// get the 2 most recent published posts
			$query =	"SELECT posts.title, posts.body, posts.date, categories.name, users.username
						 FROM posts, categories, users
						 WHERE posts.is_published = 1
						 AND posts.category_id = categories.category_id
						 AND posts.user_id = users.user_id
						 ORDER BY posts.date DESC";
			// run the query
			$result = $db->query($query);
			// if the result is bad, show us the db error message
			if(!$result){
				// show the error
				die($db->error);
			}
			// check to see if posts were found
			if($result->num_rows >= 1){
			// loop through the posts that it found
		?>

		<h2>My Blog</h2>

		<?php while($row = $result->fetch_assoc()){ ?>

		<article>
			<h3><?php echo $row['title']; ?></h3>

			<div class="post-meta">
				Author: <?php echo $row['username']; ?> |
			 	Posted on <?php echo nice_date($row['date']); ?> |
			  	In the category <?php echo $row['name']; ?>
			</div>

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