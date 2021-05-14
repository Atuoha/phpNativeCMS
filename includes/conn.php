<?php
	$conn = mysqli_connect('localhost','root','','cms' );

	if(!$conn){
		die("Database connection problem, try reconnecting " . mysqli_error($conn));
	}

?>