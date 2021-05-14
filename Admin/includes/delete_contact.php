<?php
			if(isset($_GET['delCon'])){
				$del_id = $_GET['delCon'];
				
			$query = "DELETE FROM contact WHERE id = '$del_id' ";
			
			$query_result = mysqli_query($conn,$query);


			if(!$query_result){
				die('QUERY CONTACT DELETING PROBLEM' . mysqli_error($conn));
			}	

				header('location:contact.php');
			}	

		?>