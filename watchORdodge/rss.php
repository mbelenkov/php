<?php
	require('db_config.php');

	echo '<?xml version="1.0"?>'
?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<title>watchORdodge</title>
		<link>http://localhost/maxBelenkov/watchORdodge/</link>
		<description>A movie review site with both critic and user reviews.</description>
		<atom:link href="http://localhost/maxBelenkov/blog/rss.php" rel="self" type="application/rss+xml">
		<language>en-us</language>
	</channel>
</rss>