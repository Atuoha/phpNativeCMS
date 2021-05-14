<?php include "head.php"; ?>	


<div class="center-align">	
<h2 class="center-align">
	<img src="image/ps.png" alt="Some-image" width="140px;">
</h2>
</div>	

<div id="post-div">

	<table class="highlight bordered">
		<thead>
			<tr>
				<th><b>Id</b></th>
				<th><b>Author</b></th>
				<th><b>Title</b></th>
				<th><b>Sub title</b></th>
				<th><b>Category</b></th>
				<th><b>image</b></th>
				<th><b>Content</b></th>
				<th><b>Tags</b></th>
				<th><b>Status</b></th>
				<th><b>Comment</b></th>
				<th><b>Views</b></th>
				<th><b>Date</b></th>

			</tr>	
		</thead>
		<tbody>


			<?php 
				$query = "SELECT * FROM posts";

				$res_query = mysqli_query($conn,$query);

				if(!$res_query){
					die("POST_QUERY PROBLEM" . mysqli_error($conn));
				}

				while ($row = mysqli_fetch_assoc($res_query)) {
					$pst_id = $row['pst_id'];
					$pst_tit = $row['pst_title'];
					$pst_sub_tit = $row['pst_sub_title'];
					$pst_cat = $row['pst_cat_id'];
					$pst_author = $row['pst_author'];
					$pst_date = $row['pst_date'];
					$pst_img = $row['pst_img'];
					$pst_content = $row['pst_content'];
					$pst_comment = $row['pst_comment_count'];
					$pst_tag = $row['pst_tag'];
					$pst_status = $row['pst_status'];
					$pst_status = $row['pst_status'];
					$pst_views = $row['post_view_count'];


				?>
				
				<tr>
					<td><?php echo $pst_id ?></td>
					<td><?php echo $pst_author ?></td>
					<td><?php echo $pst_tit  ?> </td>
					<td><?php echo $pst_sub_tit  ?></td>
					<td><?php echo $pst_cat ?></td>
					<td><img src="imgs_upload/<?php echo $pst_img ?>" width="100px"></td>
					<td><?php echo $pst_content  ?></td>
					<td><?php echo $pst_tag?></td>
					<td><?php echo $pst_status?></td>
					<td><?php echo $pst_comment ?></td>
					<td><?php echo $pst_views ?></td>
					<td><?php echo $pst_date?></td>		
				</tr>	

				<?php
				}
			 ?>



			</tbody>	
	</table>

</div>
</div>
</div>