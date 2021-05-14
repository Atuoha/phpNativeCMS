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


<?php
	
	if(!is_admin($_SESSION['username'])){
		header("location:index.php");
	}



?>


<?php
	if(isset($_POST['commentInputs'])){

		foreach ($_POST['commentInputs'] as $cmt_id ) {

			$options = $_POST['action_options'];


			switch ($options ) {
				case 'approve':
						$approve_cmt_query = "UPDATE comment SET status = 'approved' WHERE id = '$cmt_id' ";

						$exec_approve = mysqli_query($conn,$approve_cmt_query);

						if(!$exec_approve){
							die("Error with approving comment " . mysqli_error($conn));
						}
					break;


						case 'unapprove':
						$unapprove_cmt_query = "UPDATE comment SET status = 'unapproved' WHERE id = '$cmt_id' ";

						$exec_unapprove = mysqli_query($conn,$unapprove_cmt_query);

						if(!$exec_unapprove){
							die("Error with unapproving comment " . mysqli_error($conn));
						}
					break;


					case 'delete':
						$del_cmt_query = "DELETE FROM comment WHERE id = '$cmt_id' ";

						$exec_del = mysqli_query($conn,$del_cmt_query);

						if(!$exec_del){
							die("Error with deleting comment " . mysqli_error($conn));
						}
					break;

				
				default:
					# code...
					break;
			}
		}
	}

?>


<div id="displaypost_div">


<form method="post" >
	<div class="input-field col s12 m4" id="sel_input_divs" >
    <select name="action_options">
			<option disabled selected value="none">Select options</option>
    	
    		  <option  class=" circle" value="approve">Approve</option>
    		 <option  class=" circle" value="unapprove">Unapprove</option>
    		 <option  class=" circle" value="delete">Delete</option>

    </select>
  </div>


<button type="submit"   id="pst-btn" name="comment_activate" class="actionPerform light-green accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">assignment_turned_in</i>Apply</button>



<table>
	  <caption>INDIVIDUAL COMMENTS WITH POST REFERENCES</caption>
	<thead>
		<tr>
			<th><input type="checkbox"  name="select_all" id="select_all" />
			      <label for="select_all"></label></th>
			<th><i class="material-icons  hide-on-med-and-down">filter_1</i><b>  ID</b></th>
			<th><i class="material-icons  hide-on-med-and-down">filter_1</i><b>  POST-ID</b></th>
			<th class="center-align"><i class="material-icons  hide-on-med-and-down">account_circle</i><b>  POSTER</b></th>
			<th class="center-align"><i class="material-icons  hide-on-med-and-down">mail</i><b>  MAIL</b></th>
			<th class="center-align"><i class="material-icons  hide-on-med-and-down">question_answer</i><b>  COMMENT</b></th>
			<th>POST TITLE</th>
			<th>STATUS</th>
			<th>EDIT</th>
			<th>APPROVE</th>
			<th>UNAPPROVE</th>
			<th><i class="material-icons  hide-on-med-and-down">content_cut</i><b>  Delete</b></th>
			<th class="center-align"><i class="material-icons  hide-on-med-and-down">remove_red_eyes</i><b>  View Post</b></th>
			<th><i class="material-icons  hide-on-med-and-down">question_answer</i><b>  Reply</b></th>
			
		</tr>	
	</thead>	
	<tbody>


<!-- PREVIEWING COMMENTS FROM DATABASE -->
	<?php
		$query = "SELECT * FROM comment ORDER BY id DESC";

		$qry_res = mysqli_query($conn,$query);

		if(!$qry_res){
			die("QUERY PROBLEM WITH PULLING COMMENTS" . mysqli_error($conn));
		}




		while ($row = mysqli_fetch_assoc($qry_res)) {
			$cm_id = $row['id'];
			$pt_id = $row['pst_id'];
			$cm_name = $row['com_name'];
			$cm_mail = $row['com_mail'];
			$cm_msg = $row['com_msg'];
			$cm_status = $row['status'];



		?>

		<!-- OBTAINING THE POST TITLES -->
	<?php
	$query = "SELECT * FROM posts WHERE pst_id = '$pt_id' ";

		$query_result = mysqli_query($conn,$query);

		if(!$query_result){
			die('Error with pulling post title' . mysqli_error($conn));
		}		

		while ($row = mysqli_fetch_assoc($query_result)) {
			$post_title = $row['pst_title'];
		}

	?>	

<!-- END OF OBTAINING THE POST TITLES -->




			
			<tr>
			<td>
				<input class="checkboxes" type="checkbox" name="commentInputs[]" value="<?php echo $cm_id;?>" id="<?php echo $cm_id;?>">
				<label for="<?php echo $cm_id;?>"></label>
			</form>
			</td>	
			<td><?php echo $cm_id;?></td>
			<td><?php echo $pt_id;?></td>
			<td><?php echo $cm_name;?></td>
			<td><?php echo $cm_mail;?></td>
			<td><?php echo $cm_msg;?></td>
			<td><?php echo $post_title?></td>
			<td><?php echo $cm_status;?></td>
			<td class="center-align"><a class="cmtbtn green accent-4 waves-effect waves-light hoverable" href="edit_comment.php?editCmt=<?php echo $cm_id;?>">Edit</a></td>

			<td><a  class="cmtapp light-blue darken-4 waves-effect waves-light hoverable" href="comment.php?approve=<?php echo $cm_id;?>">Approve</a></td>

			<td><a class="cmtunapp blue-grey waves-effect waves-light hoverable" href="comment.php?Unapprove=<?php echo $cm_id; ?>">Unapprove</a></td>

			


			<td><a  rel="<?php echo $cm_id;?>" id="<?php echo $cm_msg . ' by '. $cm_name ;?>" class="delcom modal-trigger red waves-effect waves-light hoverable white-text" href="#modal2"><i class="material-icons hide-on-large-only ">clear</i><i class="hide-on-med-and-down">Remove</i></a></td>

			<td class="center-align"><a  class="edit-cat-btn green waves-effect waves-light hoverable" href="view_comment_post.php?viewpst=<?php echo $pt_id;?>" class="white-text"><i class="material-icons hide-on-large-only ">visibility</i><i class="hide-on-med-and-down">View</i></a></td>

			<td class="center-align"><a  class="edit-cat-btn  brown waves-effect waves-light hoverable" href="reply_comment.php?replypst=<?php echo $cm_id;?>" class="white-text"><i class="material-icons hide-on-large-only ">question_answer</i><i class="hide-on-med-and-down">Reply</i></a></td>

		</tr>	


		<?php	

		}


	?>	

		<!-- END OF PREVIEWING COMMENTS FROM DATABASE  -->

	</tbody>
</table>	

</div>
</div>


<!-- DELETING COMMENT -->

<?php
	if(isset($_GET['delcom'])){

		if(isset($_SESSION['role'])){
			if(isset($_SESSION['role']) == 'Admin'){

				$del_id = mysqli_real_escape_string($conn,$_GET['delcom']);

				$query_del = "DELETE FROM comment WHERE id = '$del_id' ";



				$qury_res = mysqli_query($conn,$query_del);

				if(!$qury_res){
					die("QUERY DELETING COMMENT PROBLEM" . mysqli_error($conn));
				}
				header("location:comment.php");

				$query_rep_del = "DELETE FROM comment_replies WHERE com_id = '$del_id' ";

				$exec_rep_del = mysqli_query($conn,$query_rep_del);
			}
		}
		

	}


?>

<!-- END OF DELETING COMMENT -->




<!-- APPROVING A COMMENT -->
	
	<?php 
		if(isset($_GET['approve'])){
			$app_id = $_GET['approve'];

			$approve_query = "UPDATE comment SET status = 'approved' WHERE id = '$app_id' ";

			$approve_result = mysqli_query($conn,$approve_query);

			if (!$approve_result) {
				die("UPDATING COMMENT TO APPROVED QUERY PROBLEM" . mysqli_error($conn));
			}

			header("location:comment.php");
		}

	?>
	

<!-- END OF APPROVING A COMMENT -->




<!-- UNAPPROVE COMMENTS  -->
	<?php
		if(isset($_GET['Unapprove'])){
			$unapp_id = $_GET['Unapprove'];

			$unapprove_query = "UPDATE comment SET status = 'unapproved' WHERE id = '$unapp_id' ";

			$unapp_result = mysqli_query($conn,$unapprove_query);

			if(!$unapp_result){
				die("UPDATING COMMENT WITH UNAPPROVED QUERY PROBLEM" . mysqli_error($conn));
			}

			header("location:comment.php");
		}


	?>	

<!-- END OF UNAPPOVE -->





<!-- MODAL -->

		  <!-- Modal Structure -->
    <div id="modal2" class="modal  red lighten-1" >
    <div class="modal-content">
      <a style="float: right;" class="modal-close waves-effect waves-red btn-flat"><i class="material-icons">close</i></a>

      <h5><b>Delete comment</b></h5>
      <hr class="line">
      <p>Are you sure about deleting this comment? <b>"<span class="para">  </span>"</b>
      </p>
    </div>
    <div class="modal-footer">
      <a href="" class="modalCom modal-close waves-effect waves-green btn-flat">Yes</a>
      <a class="modal-close waves-effect waves-red btn-flat">Cancel</a>

    </div>
  </div>
	<!-- END OF MODAL -->



