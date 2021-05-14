<?php
				if(isset($_POST['cat-btn'])){
					$cat_con = $_POST['cat-input'];

					// $cat_con = strtoupper($cat_content);

					if($cat_con){
						$query = mysqli_prepare($conn,"INSERT INTO categories(cat_title) VALUES(?)");

						mysqli_stmt_bind_param($query,"s",$cat_con);

						mysqli_stmt_execute($query);

						
						if(!$query){
							die('QUERY PROBLEM') +  mysqli_error($conn);
						}

						echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><b>Category added succesfully</b></p>";

					}else{
						echo "<img src='image/index.png' class='img-responsive center-align' width='30px;'/><p class=' grey lighten-3  red-text' style='padding:5px;border-radius:10px;' id='error'><i><b>OOPS!</b></i><b> Enter category name please</b></p>";
						?>

						<script>alert ("Field cannot be empty!!");</script>

						<?php



					}	

				}
						

			?>