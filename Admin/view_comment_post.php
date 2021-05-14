<?php
	include "head.php";
	include "includes/conn.php";

?>

<div  class="mainContainer" >
<div class="center-align">
<h2 class="center-align">
	<img src="image/ps.png" alt="Some-image" width="140px;">
</h2>
</div>	

<div id="post-div">

	<!-- PREVIEWING COMMENT POSTS FROM DATABASE -->
		<?php
			if(isset($_GET['viewpst'])){

			$vpst_id = $_GET['viewpst'];

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

	  	<h6 ><b><i class="material-icons">question_answer</i>COMMENT COUNT: <?php echo $check_comment_count; ?></b></h6>
<a href="comment.php" id="pst-btn" name="pst-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">question_answer</i>View Comment(s)</a>

        <div class="row ">
            <div class="col l6 s12 m12 ">
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

                     <div class="col l6 s12 m12 viePOST-div" >
                        <img class="materialboxed" data-caption="<?php  echo $tits; ?>" src="../imgs_upload/<?php echo $imgs?>" alt="html-image" id="img-single">
                    </div>

                    <!-- comment -->
                    <hr class="line">

        
                     <br>

       </div>              

</div>
</div>
