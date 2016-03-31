<?php
	require('db_config.php');
	include_once('functions.php');

	echo '<?xml version="1.0"?>';

	// get 10 most recent reviews
	$query = "SELECT reviews.review_id, reviews.body, reviews.date, movies.title, users.username, users.email
			  FROM reviews, movies, users
			  WHERE movies.movie_id = reviews.movie_id
			  AND users.user_id = reviews.user_id
			  ORDER BY date DESC
			  LIMIT 10";
	$result = $db->query($query);
	if(!$result){
		die($db->error);
	}
?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>watchORdodge</title>
		<link>http://localhost/maxBelenkov/watchORdodge/</link>
		<description>A movie review site with both critic and user reviews.</description>
		<atom:link href="http://localhost/maxBelenkov/watchORdodge/rss.php" rel="self" type="application/rss+xml"/>
		<language>en-us</language>

		<?php while($row = $result->fetch_assoc()){ ?>
		<item>
			<title><?php echo $row['title']; ?></title>
			<author><?php echo $row['email']; ?> (<?php echo $row['username']; ?>)</author>
			<pubDate><?php echo rss_date($row['date']); ?></pubDate>
			<description><![CDATA[<?php echo $row['body']; ?>]]></description>
		</item>
		<?php } // end while loop ?>
	</channel>
</rss>