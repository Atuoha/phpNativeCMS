<?php include "includes/del_cat.php";?>





<table class="bordered centered highlight">
				<thead>
				
					<tr>
					<th><i class="material-icons  hide-on-med-and-down">filter_1 </i><b> ID</b></th>
					<th><i class="material-icons  hide-on-med-and-down">description </i><b> CATEGORY TITLE</b></th>
					<th><i class="material-icons  hide-on-med-and-down">content_cut </i><b> REMOVE</b></th>
					<th><i class="material-icons  hide-on-med-and-down">format_color_text </i><b> UPDATE</b></th>
					</tr>
				</thead>
				

			<?php 

				$query = "SELECT * FROM categories ORDER BY cat_id DESC";

				$query_res = mysqli_query($conn,$query);

				while ($row = mysqli_fetch_assoc($query_res)){

					$id = $row['cat_id'];
					$cat_tit = $row['cat_title'];
				?>
				<tbody>
					<tr>
						<td><?php echo $id;?></td>
						<td><?php echo $cat_tit;?></td>
						<td><a class=" del-cat-btn red waves-effect waves-light hoverable" href="cat.php?delete=<?php echo $id;?>" class="white-text"><i class="material-icons right ">clear</i><b class="hide-on-med-and-down">Remove</b></a></td>

						<td><a  class=" edit-cat-btn green waves-effect waves-light hoverable" href="cat.php?Update=<?php echo $id;?>" class="white-text"><i class="material-icons right ">playlist_add_check</i><b class="hide-on-med-and-down">Update</b></a></td>
					</tr>

					

				<?php	
				}

			?>
			</tbody>	
			</table>'
	
