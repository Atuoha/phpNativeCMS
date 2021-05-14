<?php
	include "head.php";
	include "includes/conn.php";

?>

<?php ob_start();?>


<?php
	
	if(!is_admin($_SESSION['username'])){
		header("location:index.php");
	}



?>


<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/cat.png" alt="Some-image" width="150px;">
</h2>
</div>


<div>
	<div class="row  grey lighten-5">
		<div class="col l6 s12 ">
			<h6 ><b>Add Category</b></h6>
			<?php include "includes/add_cat.php";?>
			<form method="post" action="">
				<div class="input-field">
					<input type="text" id="cat-input" name="cat-input" placeholder="Enter Category"/>
					<label for="cat-input"><i class="material-icons">storage</i></label>
					<button type="submit" id="cat-btn" name="cat-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">queue</i>Add Category</button>
				</div>		
			</form>	

			<div id="update-con">


				
			<h6 ><b>Update Category</b></h6>

				<form method="post" action="">
				<div class="input-field">


				<?php include "includes/update_cat.php";?>
				<?php include "includes/edit_cat.php";?>


					
					<label for="cat-input"><i class="material-icons">storage</i></label>
					<button type="submit" id="cat-btn" name="edit-cat-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">playlist_add_check</i>Edit Category</button>
				</div>		
			</form>	
			</div>

		</div>	

		<div class="col l6 s12" id="display_cats">
			<span id="cat-specs" class="hoverable"><b><i class="material-icons right">storage</i>Categories</b></span>
			<?php include "includes/displayCats.php"; ?>
		</div>	
</div>

</div>	


</div>	
