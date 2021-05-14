<?php
	include "head.php";
	include "includes/conn.php";
?>
<?php ob_start();?>


<div  class="mainContainer">
<h2 class="center-align">
	<img src="image/delpost.png" alt="Some-image" width="150px;">
</h2>

<!-- PULLING COMMENT DETAILS WITH SPECIFIC ID FROM DATABASE -->
<?php
	if(isset($_GET['editCmt'])){
		$ed_idd = $_GET['editCmt'];
		// echo $ed_idd;
		$query = "SELECT * FROM comment WHERE id = '$ed_idd' ";

		$query_result = mysqli_query($conn,$query);

		if(!$query_result){
			die("QUERY PROBLEM WITH PULLING COMMENTS WITH SPECIFIC ID FROM DATABASE" . mysqli_error($conn));
		}

		while ($row = mysqli_fetch_assoc($query_result)) {
			$cm_name = $row['com_name'];
			$cm_mail = $row['com_mail'];
			$cm_msg = $row['com_msg'];
		}
		


	}	


?>

<!-- END OF  PULLING COMMENT DETAILS WITH SPECIFIC ID FROM DATABASE -->






	<!-- UPDATING COMMENTS WITH NEW INPUTS  -->
	<?php
		if(isset($_POST['adj_comment'])){

			$comt_name = $_POST['comt-name'];
			$comt_mail = $_POST['comt-mail'];
			$comt_msg = $_POST['comt-msg'];
			$edit_id = $ed_idd;

			$query_update = "UPDATE comment SET com_name = '{$comt_name}', com_mail = '{$comt_mail }', com_msg = '{$comt_msg}' WHERE id = '$edit_id' ";

			$update_result = mysqli_query($conn,$query_update);

			if(!$update_result){
				die("PROBLEM WITH UPDATING COMMENT WITH SPECIFIC ID" . mysqli_error($conn));
			}

			header("location:comment.php");

		}



	?>

	<!-- UPDATING COMMENTS WITH NEW INPUTS  -->









<div class="container" id="add_post_con">

	 <form method="post" action="">
        Name<br>
        <input type="text" name="comt-name" value="<?php if(isset($cm_name)) echo $cm_name; ?>" id="input" placeholder="Name">
        Email<br>
        <input type="Email" name="comt-mail" value="<?php if(isset($cm_mail)) echo $cm_mail; ?>" id="input" placeholder="Email">
        Comment<br>
       <textarea type="text" name="comt-msg" id="inputs" placeholder="Comment" ><?php if(isset($cm_msg)) echo $cm_msg;?></textarea>  
        <button type="submit" id="abcd" name="adj_comment" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">spellcheck</i>Adjust Comment</button> 
       </form>



	</form>	

</div>	

</div>	



















