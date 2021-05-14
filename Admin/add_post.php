
<?php
	include "head.php";
	include "includes/conn.php";
?>



<div  class="mainContainer">

<h2 class="center-align">
	<img src="image/adP.png" alt="Some-image" width="150px;">
</h2>



<div class="container" id="add_post_con">
<?php
	if(isset($_POST['pst-btn'])){
		$pst_title = $_POST['pst-tit'];
		$pst_sub = $_POST['pst-sub'];
		$pst_cat = $_POST['pst-cat'];
		$pst_author = $_POST['pst-author'];
		$pst_con = $_POST['pst-con'];
		$pst_img = $_FILES['pst-img']['name'];
		$pst_temp_image = $_FILES['pst-img']['tmp_name'];
		$pst_tag = $_POST['pst-tag'];
		$pst_date = $_POST['pst-date'];




		$pst_title = mysqli_real_escape_string($conn,$pst_title);
		$pst_sub = mysqli_real_escape_string($conn,$pst_sub);
		$pst_author = mysqli_real_escape_string($conn,$pst_author);
		$pst_con = mysqli_real_escape_string($conn,$pst_con);
		$pst_tag = mysqli_real_escape_string($conn,$pst_tag);


		move_uploaded_file($pst_temp_image, "../imgs_upload/$pst_img");
	
		if($pst_tag && $pst_img && $pst_title && $pst_sub && $pst_cat && $pst_author && $pst_con && $pst_date  ){

			$query = "INSERT INTO posts(pst_title,pst_sub_title, pst_cat_id, pst_author, pst_content, pst_img, pst_date, pst_tag) VALUES('$pst_title', '$pst_sub', '$pst_cat', '$pst_author', '$pst_con', '$pst_img', '$pst_date', '$pst_tag')";
			
			$query_result_insert = mysqli_query($conn,$query);

			if(!$query_result_insert){
				die('insert post query problem' . mysqli_error($conn));
			}

			echo "<img src='image/seen.png' class='img-responsive' width='40px;'/><p class='green-text'><b>Post added succesfully</b></p>";

				$last_created_id = mysqli_insert_id($conn);
			?>


				<a class="green-text" href="../single.php?viewPost=<?php echo $last_created_id ?>"><b>View Post</b></a> | |

				<a class="purple-text" href="edit_post.php?edPost=<?php echo $last_created_id ?>"><b>Edit Post</b></a>

			<?php
			
		}else{
			
			echo "<img src='image/index.png' class='img-responsive center-align' width='30px;'/><p class='center-align grey lighten-3 red-text' style='padding:5px; border-radius:10px;'><i><b>OOPS!</b></i><b> Please fill respective fields</b></p>";

			?>

			<script>alert ("Fields cannot be empty!!");</script>

			<?php
		}

	}



?>
<form method="post" action="add_post.php" enctype="multipart/form-data">

	<div class="input-field">
		<h6><b>Post Title</b> <i class="material-icons right">format_size</i></h6>
		<input type="text" id="cat-input" name="pst-tit" placeholder="Enter post title">
	</div>	

	<div class="input-field">
		<h6><b>Post Sub-Title</b><i class="material-icons right">create</i></h6>
		<input type="text" id="cat-input" name="pst-sub" placeholder="Enter post sub title">
	</div>	

	<div class="input-field" id="sel_input_divs">
		<h6><b>Category</b><i class="material-icons right">card_membership</i></h6>


		<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field col s12 m4" >
    <select name="pst-cat" class="icons">
			<option disabled selected>Select Category</option>
    	<?php
    		$query = "SELECT * FROM categories";

				$query_res = mysqli_query($conn,$query);

				while ($row = mysqli_fetch_assoc($query_res)){

					$id = $row['cat_id'];
					$cat_tit = $row['cat_title'];

				?>
    			  <option  value="<?php echo $id?>"  class=" circle"><?php echo strtolower($cat_tit);?></option>	

				<?php	

			}
    	?>

    </select>
  </div>
<!-- END OF SELECT THAT PULLS CATEGORIES -->




		<!-- <input type="text" id="cat-input" name="pst-cat" placeholder="Enter Category Id"> -->

	</div>	

	
	<div class="input-field">
		<h6><b>Post Content</b><i class="material-icons right">library_books</i></h6>
		<textarea id="msg" type="email" name="pst-con" placeholder="Enter Post content" ></textarea>
	</div>

	<div class="input-field">
		<h6><b>Post Image</b><i class="material-icons right">photo_library</i></h6>
		<input type="file" name="pst-img"  id="cat-input">
	</div>	

	<div class="input-field">
		<h6><b>Post Tag</b><i class="material-icons right">format_color_text</i></h6>
		<input type="text" id="cat-input" name="pst-tag" placeholder="Enter Post Tag">
	</div>


	<div class="input-field" id="sel_input_divss">
		<h6><b>Post Author</b><i class="material-icons right">account_circle</i></h6>

		<!-- SELECT THAT PULLS CATEGORIES -->
	<div class="input-field col s12 m4" >
    <select name="pst-author" class="icons">
			<option disabled selected>Select</option>
    	<?php
    		

				$query_users = mysqli_query($conn,"SELECT * FROM users");

				while ($row = mysqli_fetch_assoc($query_users)){

					$user_id = $row['user_id'];
					$username = $row['username'];

				?>
    			  <option  value="<?php echo $username?>"  class=" circle"><?php echo strtolower($username);?></option>	

				<?php	

			}
    	?>

    </select>
  </div>
<!-- END OF SELECT THAT PULLS CATEGORIES -->


		<!-- <input type="text" id="cat-input" name="pst-author" placeholder="Enter Post Author"> -->
	</div>	



	<div class="input-field">
		<h6><b>Post Date</b><i class="material-icons right">access_alarm</i></h6>
		<input type="date" class="date_picker" id="cat-input" name="pst-date" placeholder="Enter Post Tag">
	</div>

	<div class="input-field">
		<button type="submit" id="pst-btn" name="pst-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Publish Post</button>
	</div>

</form>	

</div>	



</div>	






