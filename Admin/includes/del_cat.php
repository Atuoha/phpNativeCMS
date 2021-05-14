
<?php
	if(isset($_GET['delete'])){

		$cat_del_id = $_GET['delete'];

		$query = "DELETE FROM categories WHERE cat_id = {$cat_del_id}";

		$res_del_query = mysqli_query($conn,$query);

		if(!$res_del_query){
			die("deleting query problem" . mysqli_error($conn));
		}
	}

?>

