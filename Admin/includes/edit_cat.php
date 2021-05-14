<?php
		

		// EDITING POST
if(isset($_POST['edit-cat-btn'])){

		// $cat_tits = $_POST['cat-edit'];

if(isset($cat_tit_edit)){

$cat_tits = $_POST['cat-edit'];

$query = mysqli_prepare($conn,"UPDATE categories SET cat_title = ? WHERE cat_id = ?");


mysqli_stmt_bind_param($query,"si",$cat_tits,$edit_id);

mysqli_stmt_execute($query);

// $query_res = mysqli_query($conn,$query);
	if(!$query){
		die("UPDATING QUERY PROBLEM" . mysqli_error($conn));
		}
						  
		header("Location:cat.php"); 	
								
		}else{
		echo "<br><br><b class='red-text'>No category to update<i>!</i></b>";
		
		?>

		<script>alert ("No category selected!!");</script>

		<?php

		}
						
		}

?>						