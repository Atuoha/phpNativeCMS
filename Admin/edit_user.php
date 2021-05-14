<?php
	include "head.php";
	include "includes/conn.php";
	ob_start();
?>

<div  class="mainContainer">
<div class="center-align">







<h2 class="center-align">
	<img src="image/adU.png" alt="Some-image" width="170px;">
</h2>
</div>	




<div class="container" id="add_post_con">



	<!-- PULLING  USER DETAILS WITH SPECIFIC ID -->
		<?php
			if(isset($_GET['edit_user'])){
				$edUser_id = $_GET['edit_user'];

				$query_users_pull = "SELECT * FROM users WHERE user_id = '$edUser_id' ";

				$exec_users_query = mysqli_query($conn,$query_users_pull);

				if(!$exec_users_query){
					die("Error with pulling user's details" . mysqli_error($conn));
				}

				while ($row = mysqli_fetch_assoc($exec_users_query)) {
					$username = $row['username'];
					$u_fname = $row['firstname'];
					$u_lname = $row['lastname'];
					$u_mail = $row['email'];
					$u_img = $row['user_img'];
					$u_pass = $row['password'];
					$u_role = $row['Role'];

				}


			}else{
				header("location:index.php");
			}



		?>

	<!-- END OF PULLING  USER DETAILS WITH SPECIFIC ID -->











	<!-- UPDATING USER WITH NEW DETAILS-->
		<?php
			if(isset($_POST['edit_user_details'])){

				$edit_username = $_POST['ed_username'];
				$edit_fname = $_POST['ed_fname'];
				$edit_lname = $_POST['ed_lname'];
				$edit_mail = $_POST['ed_mail'];
				$edit_img = $_FILES['ed_user_img']['name'];
				$img_temp = $_FILES['ed_user_img']['tmp_name'];
				$edit_pass = $_POST['ed_pass'];
				$edit_role = $_POST['ed_role_sel'];

				$edit_username = mysqli_escape_string($conn,$edit_username);


				// encrypting password

				// $hash = "2y$2y$10";
				// $salt = "iusesomestrangecrazystrings";
				// $hash_salt = $hash . $salt;
				// $edit_pass = crypt($edit_pass,$hash_salt);


				// end of encrypting password

				$edit_pass = password_hash($edit_pass, PASSWORD_BCRYPT, array('cost' => 12));

				if($edit_img && $edit_role){
					move_uploaded_file($img_temp, "user_imgs/$edit_img");

					$query_update_user = "UPDATE users SET username = '{$edit_username}',  firstname = '{$edit_fname}',  lastname = '{$edit_lname}',  email = '{$edit_mail}',  user_img = '{$edit_img}',  password = '{$edit_pass}',  Role = '{$edit_role}' WHERE user_id = '$edUser_id' ";

					$exec_updateUser_query = mysqli_query($conn,$query_update_user);

					if(!$exec_updateUser_query){
						die("Error updating user query" . mysqli_error($conn));
					}

					header("location:users.php");

				}elseif (!$edit_img && !$edit_role) {
					$query_update_user = "UPDATE users SET username = '{$edit_username}',  firstname = '{$edit_fname}',  lastname = '{$edit_lname}',  email = '{$edit_mail}',password = '{$edit_pass}', Role = '{$u_role}' WHERE user_id = '$edUser_id' ";

					$exec_updateUser_query = mysqli_query($conn,$query_update_user);

					if(!$exec_updateUser_query){
						die("Error updating user query" . mysqli_error($conn));
					}

					header("location:users.php");

				}elseif ($edit_img && !$edit_role) {
					move_uploaded_file($img_temp, "user_imgs/$edit_img");

					$query_update_user = "UPDATE users SET username = '{$edit_username}',  firstname = '{$edit_fname}',  lastname = '{$edit_lname}',  email = '{$edit_mail}',  user_img = '{$edit_img}',  password = '{$edit_pass}',  WHERE user_id = '$edUser_id' ";

					$exec_updateUser_query = mysqli_query($conn,$query_update_user);

					if(!$exec_updateUser_query){
						die("Error updating user query" . mysqli_error($conn));
					}

					header("location:users.php");
				}elseif (!$edit_img && $edit_role) {
					$query_update_user = "UPDATE users SET username = '{$edit_username}',  firstname = '{$edit_fname}',  lastname = '{$edit_lname}',  email = '{$edit_mail}',password = '{$edit_pass}', Role = '{$edit_role}' WHERE user_id = '$edUser_id' ";

					$exec_updateUser_query = mysqli_query($conn,$query_update_user);

					if(!$exec_updateUser_query){
						die("Error updating user query" . mysqli_error($conn));
					}

					header("location:users.php");
				}



			}


		?>
	<!-- UPDATING USER WITH NEW DETAILS -->






	


<form method="post"  enctype="multipart/form-data">

	<div class="input-field">
		<h6><b>USERNAME</b> <i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input"  name="ed_username" value="<?php if(isset($username)) echo $username ?>">
	</div>	

	<div class="input-field" id="sel_input_div">
		<h6><b>Role Specification</b><i class="material-icons right">card_membership</i></h6>


		<!-- SELECT THAT PULLS ROLES -->
	<div class="input-field col s12 m4" >
    <select name="ed_role_sel">
			<option disabled selected>Current Role:<?php if(isset($u_role)) echo $u_role ?></option>
    	
    		  <option  class=" circle">Admin</option>
    		 <option  class=" circle">Subscriber</option>



		

    </select>
  </div>
<!-- END OF SELECT THAT PULLS ROLES -->
</div>

	<div class="input-field">
		<h6><b>FIRST NAME</b><i class="material-icons right">assignment_ind</i></h6>
		<input type="text" id="cat-input" name="ed_fname" value="<?php if(isset($u_fname)) echo $u_fname ?>">
	</div>	


	<div class="input-field">
		<h6><b>LAST NAME</b><i class="material-icons right">assignment_ind</i></h6>
		<input type="text" id="cat-input" name="ed_lname" value="<?php if(isset($u_lname)) echo $u_lname ?>">
	</div>	

	<div class="input-field">
		<h6><b>EMAIL</b><i class="material-icons right">mail</i></h6>
		<input type="text" id="cat-input" name="ed_mail" value="<?php if(isset($u_mail)) echo $u_mail ?>" >
	</div>	

	<div class="input-field">
		<h6><b>Passport</b><i class="material-icons right">key</i></h6>

		<img class="materialboxed circle" data-caption="<?php echo $u_fname." " . $u_lname. "  | " . $username . " |" ?>" src="/Admin/user_imgs/<?php echo $u_img;?>" id="img">


		<input type="file" name="ed_user_img"  id="cat-input">
	</div>	

	<div class="input-field">
		<h6><b>PASSWORD</b><i class="material-icons right">key</i></h6>
		<input type="password" id="cat-input" name="ed_pass" value="<?php if(isset($u_pass)) echo $u_pass ?>">
	</div>



	<div class="input-field">
		<button type="submit" id="pst-btn" name="edit_user_details" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">assignment_ind</i>Edit User</button>
	</div>

</form>	

</div>	

</div>	



</div>