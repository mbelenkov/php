<?php
/**
* DISPLAY OUTPUT
* This file has no doctype and is not intended as a standalone file
* It simply returns the content needed for the AJAX on the interface
*/
require('db-config.php');
$cat_id = $_REQUEST['cat_id'];
// get all the public posts in that category
$query = "SELECT title, body
		  FROM posts
		  WHERE category_id = $cat_id
		  ORDER BY date DESC";
$result = $db->query($query);
if(!$result){
	echo $db->error;
}
if($result->num_rows >= 1){
?>

<h3><?php echo $result->num_rows; ?> Posts found</h3>

<?php while($row = $result->fetch_assoc()){ ?>
<article>
	<h4><?php echo $row['title']; ?></h4>
	<p><?php echo $row['body']; ?></p>
</article>
<?php } // end while loop ?>

<?php
	} else {
		echo 'There are no posts to show.';
	}
?>