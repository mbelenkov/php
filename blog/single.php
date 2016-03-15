<?php
	// template for displaying any single post with comments
	$post_id = $_GET['post_id'];
	require('db-config.php');
	include_once('function.php');
	include('comment-parse.php');
	include('header.php');
?>
	<main>
		<?php
			// get the 1 published post that we are trying to view
			$query =	"SELECT posts.title, posts.body, posts.date, categories.name, users.username, posts.allow_comments
						 FROM posts, categories, users
						 WHERE posts.is_published = 1
						 AND posts.category_id = categories.category_id
						 AND posts.user_id = users.user_id
						 AND posts.post_id = $post_id
						 ORDER BY posts.date DESC
						 LIMIT 1";
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

		<h2>Latest Posts:</h2>

		<?php
			while($row = $result->fetch_assoc()){
			// check if comments are allowed so we can use this
			// variables at the bottom of the page
			$comments_allowed = $row['allow_comments'];
		?>

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
			} // end while loop
			$result->free();

			// get all the approved comments written about this post
			$query = "SELECT users.username, comments.date, comments.body
					 FROM users, comments
					 WHERE comments.post_id = $post_id
					 AND comments.is_approved = 1
					 AND comments.user_id = users.user_id
					 ORDER BY date DESC";

			// run it
			$result = $db->query($query);

			// check it
			if(!$result){
				echo $db->error;
			}
			If($result->num_rows >= 1){
		?>

		<a href="blog.php">Read the rest of my blog!</a>

		<h2>Comments:</h2>
		<ul class="comment-list">
			<?php while($row = $result->fetch_assoc()){ ?>

			<li>
				<h3>Comment from <?php echo $row['username']; ?> on <?php echo nice_date($row['date']); ?></h3>
				<p><?php echo $row['body']; ?></p>
			</li>
			
			<?php
				} //end while comments loop
				$result->free();
			?>
		</ul>

		<?php 
			} else { //end if comments found
				echo '<h2>This post has no comments yet.</h2>';
			}

			// if comments are allowed on this post, show the form
			if($comments_allowed){
				include('comment-form.php');
			} else { // end if comments allowed
				echo 'Comments are closed.';
			}

			} else { // end if posts found
				echo 'No posts found!';
			} // end else posts found
		?>
	</main>

	<?php include('sidebar.php');
		  include('footer.php');
	?>