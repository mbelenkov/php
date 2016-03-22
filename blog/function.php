<?php
// convert datetime format to a nice looking date
function nice_date($datetime){
	$date = new DateTime($datetime);
	return $date->format('l, F j');
}

// convert datetime format to RFC 822 format for the RSS feed
function rss_date($datetime){
	$date = new DateTime($datetime);
	return $date->format('r');
}

// count the comments on ANY one post
// $post_id = the post you are counting comments for
function count_comments($post_id){
	global $db;
	// count the approved comments on post #
	$query = "SELECT COUNT(*) AS total
			 FROM comments
			 WHERE post_id = $post_id
			 AND is_approved = 1";
	// run it!
	$result = $db->query($query);
	// check it
	if($result->num_rows >= 1){
		// loop it
		while($row = $result->fetch_assoc()){
			echo $row['total'];
		} //end while loop
		// free it
		$result->free();
	} //end if
} // end function

// use for hilighting form fields with a error
function field_error($problem){
	if(isset($problem)){
		echo 'class="error"';
	}
}
// no close php