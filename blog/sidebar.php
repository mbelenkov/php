	<aside>
		<?php
		// get the titles of up to 5 latest published posts
		// and coun tthe comments on each post
		$query_latest = "SELECT title, post_id
						FROM posts
						WHERE is_published = 1
						ORDER BY date DESC
						LIMIT 5";
		// run it
		$result_latest = $db->query($query_latest);
		// check to see if any rows were found
		if($result_latest->num_rows >= 1){
		?>
		<section>
			<h2>Latest Posts</h2>
			<ul>
				<?php while($row_latest = $result_latest->fetch_assoc()){ ?>

				<li>
					<a href="single.php?post_id=<?php echo $row_latest['post_id']; ?>"><?php echo $row_latest['title']; ?></a>
								(<?php count_comments($row_latest['post_id']); ?>)
				</li>

				<?php
				} //end while loop
				// free the result
				$result_latest->free();
				?>
			</ul>
		</section>
		<?php } //end if ?>

		<?php
		$query_categories = "SELECT categories.*, COUNT(*) AS total
							FROM categories, posts
							WHERE categories.category_id = posts.category_id
							GROUP BY posts.category_id
							ORDER BY categories.name ASC";

		$side_categories = $db->query($query_categories);

		if($side_categories->num_rows >= 1){
		?>
		<section>
			<h2>Categories</h2>
			<ul>
				<?php while($row_categories = $side_categories->fetch_assoc()){ ?>

				<li>
					<a href="#"><?php echo $row_categories['name']; ?></a>
								(<?php echo $row_categories['total']; ?>)
				</li>

				<?php } // end while loop
				$side_categories->free(); ?>
			</ul>
		</section>
		<?php } // end if ?>

		<?php
		$query_links = "SELECT title, url
						FROM links
						ORDER BY RAND()";

		$side_links = $db->query($query_links);

		if($side_links->num_rows >= 1){
		?>
		<section>
			<h2>Links</h2>
			<ul>
				<?php while($row_links = $side_links->fetch_assoc()){ ?>

				<li><a href="<?php echo $row_links['url']; ?>" target="new"><?php echo $row_links['title']; ?></a></li>

				<?php } //end while loop
				$side_links->free();
				?>
			</ul>
		</section>

		<?php } // end if ?>
	</aside>