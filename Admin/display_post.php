<?php
	include "head.php";
	include "includes/conn.php";
	// include "function.php";

?>

<?php ob_start();?>


<?php
	
	if(!is_admin($_SESSION['username'])){
		header("location:index.php");
	}



?>














<!-- UPDATING POST STATUS TO PULISHED -->

<?php
	if (isset($_GET['pubPost'])) {
		$pub_postID = $_GET['pubPost'];

		$publish_postQuery = "UPDATE posts SET pst_status = 'published' WHERE pst_id = '$pub_postID' ";

		$publish_result = mysqli_query($conn,$publish_postQuery);

		if (!$publish_result) {
			die("I have a problem with updating status to published" . mysqli_error($conn));
		}

		header("location:display_post.php");
	}



?>


<!-- END OF UPDATING POST STATUS TO PUBLISHED -->









<!-- UPDATING POST STATUS TO UNPUBLISHED -->

	<?php
		if (isset($_GET['unpubPost'])) {
			$unpub = $_GET['unpubPost'];

			$unpub_Query = "UPDATE posts SET pst_status = 'Unpublished' WHERE pst_id = '$unpub' ";

			$res_unpub = mysqli_query($conn,$unpub_Query);

			if (!$res_unpub) {
				die("ERROR WITH UPDATING POST STATUS TO UNPUBLISHED " . mysqli_error($conn));
			}
		}

	?>
<!-- END OF UPDATING POST STATUS TO UNPUBLISHED -->



<!-- UPDATING POST STATUS TO DRAFT -->

	<?php
		if (isset($_GET['draftPost'])) {
			$draft = $_GET['draftPost'];

			$draft_Query = "UPDATE posts SET pst_status = 'Draft' WHERE pst_id = '$draft' ";

			$res_draft = mysqli_query($conn,$draft_Query);

			if (!$res_draft) {
				die("ERROR WITH UPDATING POST STATUS TO UNPUBLISHED " . mysqli_error($conn));
			}
		}

	?>
<!-- END OF UPDATING POST STATUS TO DRAFT -->















<div  class="mainContainer" id="display_post_div" >
<div class="center-align">
<h2 class="center-align">
	<img src="image/ps.png" alt="Some-image" width="140px;">
</h2>
</div>	





<div id="displaypost_div" >
	
<?php
	if(isset($_POST['checkedbox'])){

		foreach (($_POST['checkedbox']) as $array_input ) {
			$sel_options = $_POST['sel_options'];
			if($sel_options){
				
				switch ($sel_options) {
						case 'draft':
							$query_draft = "UPDATE posts SET pst_status = 'Draft' WHERE pst_id = '$array_input ' ";

							$exec_draft = mysqli_query($conn,$query_draft);

							if(!$exec_draft){
								die("ERROR WITH UPDATING POST TO DRAFT" . mysqli_error($conn));
							}

							break;


							case 'publish':
							$query_publish = "UPDATE posts SET pst_status = 'Published' WHERE pst_id = '$array_input ' ";

							$exec_publish = mysqli_query($conn,$query_publish);

							if(!$exec_publish){
								die("ERROR WITH UPDATING POST TO PUBLISHED" . mysqli_error($conn));
							}

							break;


							case 'unpublish':
							$query_unpublish = "UPDATE posts SET pst_status = 'Unpublished' WHERE pst_id = '$array_input ' ";

							$exec_unpublish = mysqli_query($conn,$query_unpublish);

							if(!$exec_unpublish){
								die("ERROR WITH UPDATING POST TO UNPUBLISHED" . mysqli_error($conn));
							}

							break;


							case 'delete':



							$query_del = "DELETE FROM posts WHERE pst_id = '$array_input ' ";

							$exec_del = mysqli_query($conn,$query_del);

							if(!$exec_del){
								die("ERROR WITH DELETE" . mysqli_error($conn));
							}

							break;

 
							case 'clone':
								$query_clone = "SELECT * FROM posts WHERE pst_id = '$array_input'";

								$clone_exec = mysqli_query($conn,$query_clone);

								if(!$clone_exec){
									die("Error with query_clone syntax " .mysqli_error($conn) );
								}

								while($row = mysqli_fetch_assoc($clone_exec)){
									$pst_clone_tit = $row['pst_title'];
									$pst_clone_subtit = $row['pst_sub_title'];
									$pst_clone_cat = $row['pst_cat_id'];
									$pst_clone_author = $row['pst_author'];
									$pst_clone_date = $row['pst_date'];
									$pst_clone_img = $row['pst_img'];
									$pst_clone_content = substr($row['pst_content'], 0,20);
									$pst_clone_comment = $row['pst_comment_count'];
									$pst_clone_tag = $row['pst_tag'];
									$pst_clone_status = $row['pst_status'];
									$pst_clone_views = $row['post_view_count'];
								}

								$query_copy_data = "INSERT INTO posts(pst_title, pst_sub_title, pst_cat_id, pst_author, pst_content, pst_img, pst_date, pst_tag, pst_comment_count, post_view_count) 


								VALUES('$pst_clone_tit', '$pst_clone_subtit', '$pst_clone_cat', '$pst_clone_author', '$pst_clone_content', '$pst_clone_img', '$pst_clone_date', '$pst_clone_tag', '$pst_clone_comment', '$pst_clone_views') ";

								$copy_data_exec = mysqli_query($conn,$query_copy_data);

								if(!$copy_data_exec){
									die("Error with copying data " . mysqli_error($conn));
								}
							break;



							case 'reset':

								$query_resetView = "UPDATE posts SET post_view_count = 0 WHERE pst_id = '$array_input'";

									$reset_exec = mysqli_query($conn,$query_resetView);

									if(!$reset_exec){
										die("Error with updating post views to zero " . mysqli_error($conn));

										}
							


							break;



						
						default:
							# code...
							break;
					}	

			}
		}
			
	}

?>
	



<form method="post" >
	<div class="input-field col s12 m4" id="sel_input_divs" >
    <select name="sel_options">
			<option disabled selected value="none">Select options</option>
    	
    		  <option  class=" circle" value="draft">Draft</option>
    		 <option  class=" circle" value="publish">Publish</option>
    		 <option  class=" circle" value="unpublish">Unpublish</option>
    		 <option  class=" circle" value="clone">Clone</option>
    		 <option  class=" circle" value="reset">Reset Views</option>
    		 <option  class=" circle" value="delete">Delete</option>



    </select>
  </div>


<button type="submit"   id="pst-btn" name="activate_btn" class="actionPerform light-green accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">assignment_turned_in</i>Apply</button>


<a href="add_post.php" id="pst-btn" name="pst-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Add New</a>

	

	<table class="highlight bordered responsive-table">
		<thead>
			<tr>
				<th><input type="checkbox"  name="select_all" id="select_all" />
			      <label for="select_all"></label></th>
				<th><i class="material-icons  hide-on-med-and-down">filter_1 </i><b> ID</b></th>
				<th><b>AUTHOR</b></th>
				<th><i class="material-icons  hide-on-med-and-down">format_size </i><b>Post Title</b></th>
				<th><b>Sub title</b></th>
				<th><b>Category</b></th>
				<th class="center-align"><i class="material-icons ">photo_library</i><b>Image</b></th>
				<th class="center-align"><i class="material-icons ">library_books</i><b>Content</b></th>
				<th><i class="material-icons ">format_color_text</i><b>Tags</b></th>
				<th><b>Status</b></th>
				<th><b>Comment</b></th>
				<th><b>Views</b></th>
				<th><b>Date/Time</b></th>

				<th class="hide-on-large-only"><i class="material-icons ">tag_faces</i><b>Publish</b></th>

				<th class="hide-on-large-only"><i class="material-icons ">swap_vert</i><b>Unpublish</b></th>

				<th class="hide-on-large-only"><i class="material-icons ">spa</i><b>Draft</b></th>

				<th><i class="material-icons  hide-on-med-and-down">content_cut</i><b>Delete</b></th>

				<th><i class="material-icons  hide-on-med-and-down">edit</i><b>Edit</b></th>
				



			</tr>	
		</thead>
		<tbody>


			<!-- feteching post from database -->
			<?php 
				// $query = "SELECT * FROM posts ORDER BY pst_id DESC";

				$query = "SELECT posts.pst_id,posts.pst_title,posts.pst_sub_title,posts.pst_cat_id,posts.pst_author,posts.pst_date,posts.pst_img,posts.pst_content,posts.pst_comment_count,posts.pst_tag,posts.pst_status,posts.post_view_count,categories.cat_id,categories.cat_title FROM posts LEFT JOIN categories ON posts.pst_cat_id = categories.cat_id ORDER BY pst_id DESC";

				$res_query = mysqli_query($conn,$query);

				if(!$res_query){
					die("POST_QUERY PROBLEM" . mysqli_error($conn));
				}

				$count = mysqli_num_rows($res_query);


				while ($row = mysqli_fetch_assoc($res_query)) {
					$pst_id = $row['pst_id'];
					$pst_tit = $row['pst_title'];
					$pst_sub_tit = $row['pst_sub_title'];
					$pst_cat = $row['pst_cat_id'];
					$pst_author = $row['pst_author'];
					$pst_date = $row['pst_date'];
					$pst_img = $row['pst_img'];
					$pst_content = substr($row['pst_content'], 0,20);
					$pst_comment = $row['pst_comment_count'];
					$pst_tag = $row['pst_tag'];
					$pst_status = $row['pst_status'];
					$pst_views = $row['post_view_count'];
					$cat_title = $row['cat_title'];



						// PULLING COMMENT COUNT FOR EACH POST 

						$query_comment = "SELECT * FROM comment WHERE pst_id = '$pst_id' ";	

						$query_result_comment = mysqli_query($conn,$query_comment);


						if(!$query_comment){
							die("QUERY PROBLEM WITH PULLING COMMENT RELATED TO A PARTICULAR ID" . mysqli_error($conn));
						}	

						$comment_count = mysqli_num_rows($query_result_comment);


 						// END OF PULLING COMMENT COUNT FOR EACH POST 




						// PULLING THE EXACT CATEGORY TITLE

					// $query_cat = "SELECT * FROM categories WHERE cat_id = '$pst_cat' ";

					// $exec_result = mysqli_query($conn,$query_cat);

					// if(!$exec_result){
					// 	die("QUERY PROBLEM WITHOUT PULLING THE EXACT CATEGORY TITLE" .mysqli_error($conn));
					// }




					// while ($row = mysqli_fetch_assoc($exec_result)) {
						// $cat_title = $row['cat_title']; 
					// }

					// END OF PULLING THE EXACT CATEGROY TITLE



				?>
				
				<tr>

					<td>			
			      	<input type="checkbox"  class="checkboxes" name="checkedbox[]" value="<?php echo $pst_id?>"  id="<?php echo $pst_id?>" />
			      	<label for="<?php echo $pst_id?>"></label>
			      	</form>
			    	</td>

					<td><?php echo $pst_id ?></td>
					<td><?php echo $pst_author ?></td>
					<td><a class="green-text" href="../single.php?viewPost=<?php echo $pst_id ?>"><b>click to view</b></a><br><br><?php echo $pst_tit  ?> </td>
					<td><?php echo $pst_sub_tit  ?></td>
					<td><?php echo $cat_title ?></td>
					<td><img  class="materialboxed" data-caption="<?php  echo $pst_tit; ?>" src="../imgs_upload/<?php echo $pst_img ?>" width="100px"></td>
					<td><?php echo $pst_content  ?></td>
					<td><?php echo $pst_tag?></td>
					<td><?php echo $pst_status?></td>

					<td><a class="comment_cnt black-text" href="post_comments.php?pst_cmt=<?php echo  $pst_id ?>"><?php echo $comment_count ?></a></td>

					<td><a  href="display_post.php?resetView=<?php echo $pst_id?>" class="black-text resetView"><?php echo $pst_views ?></a></td>

					<td><?php echo date('d-m-Y  h:i:a', strtotime ($pst_date))?></td>	

					<td class="hide-on-large-only"><a class="pubpost blue waves-effect waves-light hoverable" href="display_post.php?pubPost=<?php echo $pst_id;?>" class="white-text"><i class="material-icons hide-on-large-only ">tag_faces</i><i class="hide-on-med-and-down">Publish</i></a></td>


					<td class="hide-on-large-only" ><a class="unpubpost deep-orange accent-4 waves-effect waves-light hoverable" href="display_post.php?unpubPost=<?php echo $pst_id;?>" class="white-text"><i class="material-icons hide-on-large-only ">all_out</i><i class="hide-on-med-and-down">Unpublish</i></a></td>


					<td class="hide-on-large-only"><a class="unpubpost deep-orange accent-4 waves-effect waves-light hoverable" href="display_post.php?draftPost=<?php echo $pst_id;?>" class="white-text"><i class="material-icons hide-on-large-only ">swap_vert</i><i class="hide-on-med-and-down">Draft</i></a></td>


					<!-- Delete using post -->

						<form method="post">
							<input type="hidden" name="post_id" value="<?php echo $pst_id ?>">

							<td><button type="submit" class="delpost delpst red waves-effect waves-light hoverable " name="delete_btn"><i class="material-icons hide-on-large-only ">clear</i><i class="hide-on-med-and-down">Remove</i></button></td> 

						</form>	


					<!-- Delete using post -->



			<!-- 		<td ><a  class=" hide-on-large-only delpost delpst red waves-effect waves-light hoverable" href="display_post.php?delPost=<?php echo $pst_id;?>" class="white-text"><i class="material-icons hide-on-large-only ">clear</i><i class="hide-on-med-and-down">Remove</i></a></td> -->

					<td><a  class=" edit-cat-btn green waves-effect waves-light hoverable" href="edit_post.php?edPost=<?php echo $pst_id;?>" class="white-text"><i class="material-icons hide-on-large-only ">playlist_add_check</i><i class="hide-on-med-and-down">Update</i></a></td>
				
				</tr>	

				<?php
				}
			 ?>

			 <!-- end of fetching posts from database -->


			</tbody>	
	</table>

</div>
</div>
</div>






<!-- RESETING POST VIEW COUNT TO ZERO -->
	
	<?php
		if(isset($_GET['resetView'])){
			$reset_id = $_GET['resetView'];

			$query_resetView = "UPDATE posts SET post_view_count = 0 WHERE pst_id = '$reset_id'";

				$reset_exec = mysqli_query($conn,$query_resetView);

				header("location:display_post.php");


				if(!$reset_exec){
					die("Error with updating post views to zero " . mysqli_error($conn));

					}
		}
	?>



<!-- END OF RESETING POST VIEW COUNT TO ZERO -->





<!-- DELETE POST -->
<?php
	if(isset($_POST['delete_btn'])){

		$del_id = $_POST['post_id'];

		$query = "DELETE FROM posts WHERE pst_id = '$del_id' ";

		$query_result = mysqli_query($conn,$query);

		if(!$query_result){
			die("DELETING QUERY PROBLEM" . mysqli_error($conn));
		}
	}



?>
<!-- DELETE POST -->