<?php
	include "head.php";
	include "includes/conn.php";
?>


<?php ob_start();?>

<?php 
	if(isset($_GET['edPost'])){
		$ed_id = $_GET['edPost'];

		$query = "SELECT * FROM posts WHERE pst_id = '$ed_id' ";

		$query_res = mysqli_query($conn,$query);

		if(!$query_res){
			die("UPDATING POST QUERY PROBLEM" . mysqli_error($conn));
		}	


		while ($row = mysqli_fetch_assoc($query_res)) {
			
			$pst_tit = $row['pst_title'];
			$cat_id = $row['pst_cat_id'];
			$pst_sub_title = $row['pst_sub_title'];
			$pst_author = $row['pst_author'];
			$pst_date = $row['pst_date'];
			$pst_img = $row['pst_img'];
			$pst_cont = $row['pst_content'];
			$pst_tag = $row['pst_tag'];
		}

		
	}





 ?>



<div  class="mainContainer">

<h2 class="center-align">
	<img src="image/delpost.png" alt="Some-image" width="150px;">
</h2>


<div class="container" id="add_post_con">



<form method="post" action="" enctype="multipart/form-data">










<?php




	if(isset($_POST['edit-btn'])){

			$pst = $_POST['ed-tit'];
			$sub = $_POST['ed-sub'];
			$cat = $_POST['ed-cat'];
			$author = $_POST['ed-author'];
			$date = $_POST['ed-date'];
			$img = $_FILES['ed-img']['name'];
			$img_temp = $_FILES['ed-img']['tmp_name'];
			$con = $_POST['ed-con'];
			$tag = $_POST['ed-tag'];
			$existing_cat_id = $cat_id;




			if($img_temp && $cat && $author){
				move_uploaded_file($img_temp, "../imgs_upload/$img");

				$query = "UPDATE posts SET pst_title = '{$pst}', pst_sub_title = '{$sub}' , pst_cat_id = '{$cat}', pst_date = '{$date}', pst_author = '{$author}', pst_img = '{$img}', pst_tag = '{$tag}', pst_content = '{$con}' WHERE pst_id = '$ed_id'  ";

				$editpost_query = mysqli_query($conn,$query);

				if(!$editpost_query){
					die("EDIT POST QUERY PROBLEM" . mysqli_error($conn));
				}

				// header('location:post.php');

				echo "<b class='green-text'>POST UPDATED <a href='../single.php?viewPost={$ed_id}'>VIEW POST</a> || <a href='post.php'>EDIT MORE POSTS</a></b>";

			}elseif(!$img_temp && !$cat && !$author){

				$query = "UPDATE posts SET pst_title = '{$pst}', pst_sub_title = '{$sub}' , pst_cat_id = '{$existing_cat_id}', pst_date = '{$date}', pst_author = '{$pst_author}', pst_tag = '{$tag}', pst_content = '{$con}' WHERE pst_id = '$ed_id'  ";

				$editpost_query = mysqli_query($conn,$query);

				if(!$editpost_query){
					die("EDIT POST QUERY PROBLEM" . mysqli_error($conn));
				}
				
				// header('location:post.php');
				echo "<b class='green-text'>POST UPDATED <a href='../single.php?viewPost={$ed_id}'>VIEW POST</a> || <a href='post.php'>EDIT MORE POSTS</a></b>";

			}elseif($img_temp && !$cat && !$author){
				move_uploaded_file($img_temp, "../imgs_upload/$img");

				$query = "UPDATE posts SET pst_title = '{$pst}', pst_sub_title = '{$sub}' , pst_cat_id = '{$existing_cat_id}', pst_date = '{$date}', pst_author = '{$pst_author}', pst_img = '{$img}', pst_tag = '{$tag}', pst_content = '{$con}' WHERE pst_id = '$ed_id'  ";

				$editpost_query = mysqli_query($conn,$query);

				if(!$editpost_query){
					die("EDIT POST QUERY PROBLEM" . mysqli_error($conn));
				}

				// header('location:post.php');
				echo "<b class='green-text'>POST UPDATED <a href='../single.php?viewPost={$ed_id}'>VIEW POST</a> || <a href='post.php'>EDIT MORE POSTS</a></b>";

			}elseif(!$img_temp && $cat  && $author){
				$query = "UPDATE posts SET pst_title = '{$pst}', pst_sub_title = '{$sub}' , pst_cat_id = '{$cat}', pst_date = '{$date}', pst_author = '{$author}', pst_tag = '{$tag}', pst_content = '{$con}' WHERE pst_id = '$ed_id'  ";

				$editpost_query = mysqli_query($conn,$query);

				if(!$editpost_query){
					die("EDIT POST QUERY PROBLEM" . mysqli_error($conn));
				}
				
				// header('location:post.php');

				echo "<b class='green-text'>POST UPDATED <a href='../single.php?viewPost={$ed_id}'>VIEW POST</a> || <a href='post.php'>EDIT MORE POSTS</a></b>";
			}elseif(!$img_temp && !$cat  && $author){
				$query = "UPDATE posts SET pst_title = '{$pst}', pst_sub_title = '{$sub}' , pst_cat_id = '{$existing_cat_id}', pst_date = '{$date}', pst_author = '{$author}', pst_tag = '{$tag}', pst_content = '{$con}' WHERE pst_id = '$ed_id'  ";

				$editpost_query = mysqli_query($conn,$query);

				if(!$editpost_query){
					die("EDIT POST QUERY PROBLEM" . mysqli_error($conn));
				}
				
				// header('location:post.php');

				echo "<b class='green-text'>POST UPDATED <a href='../single.php?viewPost={$ed_id}'>VIEW POST</a> || <a href='post.php'>EDIT MORE POSTS</a></b>";
			}elseif($img_temp && !$cat  && $author){
				$query = "UPDATE posts SET pst_title = '{$pst}', pst_sub_title = '{$sub}' , pst_cat_id = '{$existing_cat_id}', pst_date = '{$date}', pst_img = '{$img}', pst_author = '{$author}', pst_tag = '{$tag}', pst_content = '{$con}' WHERE pst_id = '$ed_id'  ";

				$editpost_query = mysqli_query($conn,$query);

				if(!$editpost_query){
					die("EDIT POST QUERY PROBLEM" . mysqli_error($conn));
				}
				
				// header('location:post.php');

				echo "<b class='green-text'>POST UPDATED <a href='../single.php?viewPost={$ed_id}'>VIEW POST</a> || <a href='post.php'>EDIT MORE POSTS</a></b>";
			}elseif(!$img_temp && $cat  && !$author){
				$query = "UPDATE posts SET pst_title = '{$pst}', pst_sub_title = '{$sub}' , pst_cat_id = '{$cat}', pst_date = '{$date}', pst_author = '{$pst_author}', pst_tag = '{$tag}', pst_content = '{$con}' WHERE pst_id = '$ed_id'  ";

				$editpost_query = mysqli_query($conn,$query);

				if(!$editpost_query){
					die("EDIT POST QUERY PROBLEM" . mysqli_error($conn));
				}
				
				// header('location:post.php');

				echo "<b class='green-text'>POST UPDATED <a href='../single.php?viewPost={$ed_id}'>VIEW POST</a> || <a href='post.php'>EDIT MORE POSTS</a></b>";
			}				
		}


						










?>

	<div class="input-field">
		<h6><b>Post Title</b> <i class="material-icons right">format_size</i></h6>
		<input type="text" value="<?php if(isset($pst_tit)) {echo $pst_tit;} ?>" id="cat-input" name="ed-tit" placeholder="Enter post title">
	</div>	

	<div class="input-field">
		<h6><b>Post Sub-Title</b><i class="material-icons right">create</i></h6>
		<input type="text" id="cat-input" value="<?php if(isset($pst_sub_title)) {echo $pst_sub_title;} ?>" name="ed-sub" placeholder="Enter post sub title">
	</div>	

	<div class="input-field" id="sel_input_div">
		<h6><b>Category Id</b><i class="material-icons right">filter_1</i></h6>

<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field col s12 m6" >
    <select name="ed-cat" class="icons">
				<option value="" disabled selected>Current Category ID:<b><?php if(isset($cat_id)) {echo $cat_id;} ?></b></option>

    	<?php
    		$query = "SELECT * FROM categories";

				$query_res = mysqli_query($conn,$query);

				while ($row = mysqli_fetch_assoc($query_res)){

					$id = $row['cat_id'];
					$cat_tit = $row['cat_title'];

				?>
    			  <option  value="<?php echo $id?>"  class=" circle"><?php echo $cat_tit;?></option>	

				<?php	

			}
    	?>

    </select>
  </div>
<!-- END OF SELECT THAT PULLS CATEGORIES -->



	<!-- <input type="text" id="cat-input"   value="<?php if(isset($cat_id)) {echo $cat_id;} ?>"  placeholder="PRESENT CATEGORY ID"> -->
	</div>	



	<div class="input-field">
		<h6><b>Post Content</b><i class="material-icons right">library_books</i></h6>
		<textarea id="msg"   name="ed-con" placeholder="Enter Post content"><?php if(isset($pst_cont)) { echo str_replace('/r/n', '<br>',  $pst_cont);} ?></textarea> 	
	</div>	

	<div class="input-field">
		<h6><b>Post Image</b><i class="material-icons right">photo_library</i></h6>
		<img class="materialboxed" data-caption="<?php  echo $pst_tit; ?>" src="../imgs_upload/<?php echo $pst_img;?>" id="img">

		<input type="file" name="ed-img" id="cat-input">

	</div>	

	<div class="input-field">
		<h6><b>Post Tag</b><i class="material-icons right">format_color_text</i></h6>
		<input type="text" id="cat-input"  value="<?php if(isset($pst_tag)) {echo $pst_tag;} ?>" name="ed-tag" placeholder="Enter Post Tag">
	</div>





		<div class="input-field" id="sel_input_divss">
		<h6><b>Post Author</b><i class="material-icons right">account_circle</i></h6>

		<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field col s12 m4" >
    <select name="ed-author" class="icons">
			<option disabled selected><?php if(isset($pst_author)) {echo $pst_author;} ?></option>
    	<?php
    		

				$query_users = mysqli_query($conn,"SELECT * FROM users");

				while ($row = mysqli_fetch_assoc($query_users)){

					$user_id = $row['user_id'];
					$username = $row['username'];

				?>
    			  <option  value="<?php echo  $username; ?>"  class=" circle"><?php echo strtolower($username);?></option>	

				<?php	

			}
    	?>

    </select>
  </div>
<!-- END OF SELECT THAT PULLS CATEGORIES -->
	
		<!-- <input type="text" id="cat-input"  value="<?php if(isset($pst_author)) {echo $pst_author;} ?>" name="ed-author" placeholder="Enter Post Author"> -->

	</div>	







	<div class="input-field">
		<h6><b>Post Date</b><i class="material-icons right">access_alarm</i></h6>
		<input type="date" class="date_picker"  value="<?php if(isset($pst_date)) {echo $pst_date;} ?>" id="cat-input" name="ed-date" placeholder="Enter Post Tag">
	</div>



	<?php
			
	?>


	<div class="input-field">
		<button type="submit" id="pst-btn" name="edit-btn" class="pst-btn light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Edit Post</button>

		<!-- RESET POST VIEW COUNT -->
		<button type="submit" id="reset-btn" name="reset_view" class="pst-btn light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">build</i>Reset Post Views</button>

		<?php
			if(isset($_POST['reset_view'])){

				$query_resetView = "UPDATE posts SET post_view_count = 0 WHERE pst_id = '$ed_id'";

				$reset_exec = mysqli_query($conn,$query_resetView);



				if(!$reset_exec){
					die("Error with updating post views to zero " . mysqli_error($conn));

					}
			}
		?>

		<!-- END OF RESET POST VIEW COUNT -->
	</div>

</form>	

</div>	



</div>	



</div>





