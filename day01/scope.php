<?php 
	$the_number = 7;

	function double_it($num){
		// global $the_number;
		return $num * 2;
	}

	echo double_it( $the_number);
?>