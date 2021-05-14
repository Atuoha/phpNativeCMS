<?php
	include "head.php";
	include "includes/conn.php";

?>

<?php ob_start();?>

<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/mg.png" alt="Some-image" width="150px;">
</h2>
</div>	



<div id="post-div" >
	<!-- <h5 class="center-align"><b>COMMENT WITH REPLY</b></h5> -->

<?php
// CHECKING POST COUNT
			$rpst_id = $_GET['replypst'];
			$check_count_query = "SELECT * FROM comment WHERE id ='$rpst_id' ";

			$check_result = mysqli_query($conn,$check_count_query);

			if(!$check_result){
				die("CHECKING COUNT PULLING PROBLEM" . mysqli_error($conn));
			}

			$check_comment_count = mysqli_num_rows($check_result);


			// END OF CHECKING POST COUNT
?>
<h6 ><b><i class="material-icons">question_answer</i>COMMENT COUNT: <?php echo $check_comment_count; ?></b></h6>
		<hr class="line">



                     <!-- MAIN DIVISION -->

                    <div id="comment-div" class="grey lighten-4" >




	
		<!-- PULLING COMMENTS -->
		<?php
			if(isset($_GET['replypst'])){

			$rpst_id = $_GET['replypst'];

			// echo $rpst_id;

			$query =  "SELECT * FROM comment WHERE id = '$rpst_id' ";

			$query_result = mysqli_query($conn,$query);

			if(!$query_result){
				die("QUERY PROBLEM WITH PULLING COMMENTED POST"  . mysqli_error($conn));
			} 

			while ($row = mysqli_fetch_assoc($query_result)) {
				
				$name = $row['com_name'];
				$mail = $row['com_mail'];
				$msg = $row['com_msg'];
				$date = $row['com_date']

			?>
			


			   <div class="chip" style="margin-top: 20px;">
                    <img src="image/default.png" alt="Contact Person">
                    <strong><b><?php echo $name?></b></strong> | <?php echo $mail?> | at <?php echo date('d-m-Y  || h:i:a', strtotime ($date)) ?> <br class="hide-on-med-and-down"> <i class="hide-on-large-only"> | | </i>
                     <?php echo $msg?>
                  </div>


              <!-- VIEWING COMMENTS -->
                <!-- <p><img width="40px;" class="circle"  src="image/default.png"><b><?php echo $name ."</b>" ." | ";  echo $mail . " | ";?>  at <?php echo $date ?> <br> <?php echo "<i>".$msg . "</i>";?>  </p> -->

              <!-- END OF COMMENTS -->
			
			<?php	
			}


		


			// VIEWING REPLIES QUREY

			$view_reply_query = "SELECT * FROM comment_replies WHERE com_id = '$rpst_id' ";

			$view_result = mysqli_query($conn,$view_reply_query);

			if(!$view_reply_query){
				die("QUERY PROBLEM WITH PULLING REPLIES " . mysqli_error($conn));
			}

			while ($row = mysqli_fetch_assoc($view_result)) {
				
				$name_reply = $row['rep_name'];
				$reply_msg = $row['rep_msg'];
				$reply_mail = $row['rep_mail'];
				$date = $row['rep_date']

			?>
			



			<div id="reply-p" class="chip" style="margin-top: 20px;">
                    <img src="image/avatar.png" alt="Contact Person">
                    <strong><b><?php echo $name_reply?></b></strong> | <?php echo $reply_mail?> | at <?php echo date('d-m-Y || h:i:a', strtotime ($date)) ?> <br class="hide-on-med-and-down"> <i class="hide-on-large-only"> | | </i>
                     <?php echo $reply_msg?>
                  </div>


              <!-- VIEWING REPLIES PARAGRAPH -->

                <!-- <p id="reply-p"><img width="40px;" class="circle"  src="image/avatar.png"><b><?php echo $name_reply ."</b>" ." | ";  echo $reply_mail . " | ";?> at <?php echo $date ?> <br>  <?php echo "<i>".$reply_msg . "</i>";?>  </p> -->
                        
              <!-- END OF VIEWING REPLIES PARAGRAPH -->


			<?php	

			}


			$rep_count = mysqli_num_rows($view_result);

			// END OF VIEWING REPLIES QUERY

		}

		?>

		<!-- END OF PULLING COMMENTS -->

		

                        	



                        






                        <!-- SENDING COMMENT -->
                        <?php

                            if(isset($_POST['send-message'])){
                                $com_name =  $_POST['comment-name'];
                                $com_mail = $_POST['comment-mail'];
                                $com_msg = $_POST['comment_msg'];
                                $date = date('Y-m-d h:i:sa');
                               	$com_id = $rpst_id;

                                $com_msg = mysqli_real_escape_string($conn,$com_msg);

                               if($com_name && $com_mail && $com_msg){
 
                                $comt_query = "INSERT INTO comment_replies(rep_name, rep_mail,rep_msg,com_id,rep_date) VALUES('$com_name', '$com_mail', '$com_msg', '$com_id',now())";
                                
                                $query_res = mysqli_query($conn,$comt_query);
                                // header("location:reply_comment.php"); 
                                if(!$query_res){
                                    die("QUERY PROBLEM WITH INSERTING COMMENT " . mysqli_error($conn));
                                }
                                    echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><b>$com_name | your reply has been sent succesfully <i>!</i> | </b></p>"; 
                                   

                               }else{
                                echo "<img src='image/index.png' class='img-responsive center-align' width='30px;'/><p class='red-text'><i><b>OOPS!</b></i><b> Please fill respective fields</b></p>";
                               }
                            }


                        ?>

                        <!-- END OF SENDING COMMENT -->



                        <p class="p-top">Leave a Reply</p>
                        <form method="post" action="">
                            Admin Name<br>
                            <input type="text" name="comment-name" id="input" placeholder="Name">
                            Admin Email<br>
                            <input type="Email" name="comment-mail" id="input" placeholder="Email">
                            Your Reply<br>
                            <textarea type="text" name="comment_msg" id="inputs" placeholder="Comment" ></textarea>  
                            <button type="submit" id="abc" name="send-message" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">insert_comment</i>Comment</button> 
                        </form>

                    </div>  


                    <!-- end of comment -->


		<!-- END OF MAIN DIVISION -->


</div>
</div>