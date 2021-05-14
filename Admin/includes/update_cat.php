<?php 

						// UPLOADING THE DYNAMIC TEXT ON THE INPUT BOX

					if(isset($_GET['Update'])){
						$edit_id = $_GET['Update'];

						$query = "SELECT * FROM Categories WHERE cat_id = $edit_id";

						$res_quered = mysqli_query($conn,$query);

						while ($row = mysqli_fetch_assoc($res_quered)) {
							$cat_id_edit = $row['cat_id'];
							$cat_tit_edit = $row['cat_title'];
						}


						?>

							<input type="text" id="cat-input" name="cat-edit" value="<?php if(isset($cat_tit_edit)) {echo $cat_tit_edit;} ?>" placeholder="Enter New Category Name"/>

						<?php

					}


			


				?>