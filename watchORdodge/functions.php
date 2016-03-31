<?php
function rss_date($datetime){
	$date = new DateTime($datetime);
	return $date->format('r');
}

// don't close php