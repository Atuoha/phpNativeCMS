<?php
	include "head.php";
	include "includes/conn.php";

?>

<?php ob_start();?>

<div  class="mainContainer" >
<div class="center-align">

<h2 class="center-align">
	<img src="image/mg.png" alt="Some-image" width="150px;">
</h2>
</div>	

<div >
	<div class="row">

		<?php
// CHECKING POST COUNT
			$pst_id = $_GET['pst_cmt'];
			$check_count_query = "SELECT * FROM comment WHERE pst_id ='$pst_id' ";

			$check_result = mysqli_query($conn,$check_count_query);

			if(!$check_result){
				die("CHECKING COUNT PULLING PROBLEM" . mysqli_error($conn));
			}

			$check_comment_count = mysqli_num_rows($check_result);



			// END OF CHECKING POST COUNT
			?>
			<h6 ><b><i class="material-icons">question_answer</i>COMMENT COUNT: <?php echo $check_comment_count; ?></b></h6>
			<hr class="line">





		<div class="col l6 s12 grey lighten-4" id="post-div comment-div">

			<?php
			if($check_comment_count == 0){
				 echo "<h6 class='center-align'><img id='error'  src='image/ss.png' class='img-responsive center-align'/><h5 class='center-align brown-text   ' style='border-radius:10px; padding:5px'><i><b>OPPS!!!</b></i> No comments</h6></h5>";
			}

			?>

		<!-- PULLING COMMENTS -->
		<?php
			if(isset($_GET['pst_cmt'])){

			$pst_id = $_GET['pst_cmt'];

			// echo $rpst_id;

			$query =  "SELECT * FROM comment WHERE pst_id = '$pst_id' ";

			$query_result = mysqli_query($conn,$query);

			if(!$query_result){
				die("QUERY PROBLEM WITH PULLING COMMENTED POST"  . mysqli_error($conn));
			} 

			while ($row = mysqli_fetch_assoc($query_result)) {

				$cm_id = $row['id'];
				$name = $row['com_name'];
				$mail = $row['com_mail'];
				$msg = $row['com_msg'];
				$date = $row['com_date']

			?>
			


			   <div class="chip" style="margin-top: 20px;">
                    <img src="image/default.png" alt="Contact Person">
                    <strong><b><?php echo $name?></b></strong> | <?php echo $mail?> | at <?php echo date('d-m-Y  || h:i:a', strtotime ($date)) ?> <br class="hide-on-med-and-down"> <i class="hide-on-large-only"> | | </i>
                     <?php echo $msg?>

                     <i><a href="" ><b>Reply</b></a></i>
                     <i><a href="post_comments.php?pst_cmt=<?php echo  $pst_id ?> & delCmt=<?php echo $cm_id?>" class=" delpst red-text" ><b>Delete</b></a></i>

                  </div>


              <!-- VIEWING COMMENTS -->
                <!-- <p><img width="40px;" class="circle"  src="image/default.png"><b><?php echo $name ."</b>" ." | ";  echo $mail . " | ";?>  at <?php echo $date ?> <br> <?php echo "<i>".$msg . "</i>";?>  </p> -->

              <!-- END OF COMMENTS -->
			
			<?php	
			}


		


		
		}

		?>

		<!-- END OF PULLING COMMENTS -->
		</div>

		<div class="col l6 s12">

		<div>	

			<!-- PREVIEWING COMMENT POSTS FROM DATABASE -->
		<?php
			if(isset($_GET['pst_cmt'])){

			$vpst_id = $_GET['pst_cmt'];

			// echo $vpst_id;

			$query =  "SELECT * FROM posts WHERE pst_id = '$vpst_id' ";

			$query_result = mysqli_query($conn,$query);

			if(!$query_result){
				die("QUERY PROBLEM WITH PULLING COMMENTED POST"  . mysqli_error($conn));
			} 

			while ($row = mysqli_fetch_assoc($query_result)) {
				$id = $row['pst_id'];
				$tits = $row['pst_title'];
				$subs = $row['pst_sub_title'];
				$authors = $row['pst_author'];
				$tags = $row['pst_tag'];
				$dates = $row['pst_date'];
				$imgs = $row['pst_img'];
				$cons = $row['pst_content'];
			}

			// CHECKING POST COUNT
			$check_count_query = "SELECT * FROM comment WHERE pst_id ='$vpst_id' ";

			$check_result = mysqli_query($conn,$check_count_query);

			if(!$check_result){
				die("CHECKING COUNT PULLING PROBLEM" . mysqli_error($conn));
			}

			$check_comment_count = mysqli_num_rows($check_result);


			// END OF CHECKING POST COUNT
		}

		?>


<!-- END OF PREVIEWING COMMENT POSTS FROM DATABASE -->

	


	
<!-- 	  <div class="container" id="main-div"> -->



<h6><b><i class="material-icons">filter_1</i>POST ID: <?php echo $id ;?></b></h6>

	  <!-- 	<h6 ><b><i class="material-icons">question_answer</i>COMMENT COUNT: <?php echo $check_comment_count; ?></b></h6> -->
<a href="comment.php" id="pst-btn" name="pst-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">question_answer</i>View more comments</a>

            <div>
                <span id="page-head"><b><?php echo $tits;?></b></span>
                 <span class="grey-text" id="sub-text"><?php echo $subs;?></span> 
                    <hr class="line">
                    <p><h5 class="light-blue-text text-accent-4"><?php echo $authors;?></h5></p>
                    <p><h6>for <span class="light-blue-text text-accent-4" ><?php echo $tags;?></span></h6></p>

                    <span >Posted on: <?php echo $dates;?></span>
                    <hr class="line">

                   
                        
                    <hr class="line">

                    <p> <?php echo $cons?>  </p> 
                    
                    </div> 

                     <div class="viePOST-div " >
                        <img class="materialboxed" data-caption="<?php  echo $tits; ?>" src="../imgs_upload/<?php echo $imgs?>" alt="html-image" id="img-single">
                    </div>

                    <!-- comment -->
                    <hr class="line">

        
                     <br>

















		</div>
		


</div>	
</div>
</div>






<!-- Deleting comment -->

	<?php
		if(isset($_GET['delCmt'])){
			$cm_del_id = $_GET['delCmt'];

			$del_cmt_query = mysqli_query($conn,"DELETE FROM comment WHERE id = '$cm_del_id' ");

			if(!$del_cmt_query){
				die("Error with deleting specific comment " . mysqli_error($conn));

			header("location:post_comments?pst_cmt=" . $_GET['$pst_id']. "");
				
			}
		}

		
	?>



<!-- End of deleting comment -->