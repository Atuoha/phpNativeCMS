<?php
	include "head.php";
	include "includes/conn.php";

?>

<div  class="mainContainer">
<div class="center-align">



<?php
	
	if(!is_admin($_SESSION['username'])){
		header("location:index.php");
	}



?>




<h2 class="center-align">
	<img src="image/adU.png" alt="Some-image" width="170px;">
</h2>
</div>	

<div class="container" id="add_post_con">

	<!-- REGISTERINNG A USER  -->

			<?php
				if(isset($_POST['reg_user'])){
					$username = $_POST['username'];
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$mail = $_POST['mail'];
					$img = $_FILES['user_img']['name'];
					$img_temp = $_FILES['user_img']['tmp_name'];
					$pass = $_POST['pass'];
					$role = $_POST['role_sel'];


					$username = mysqli_escape_string($conn,$username);

					// encrypting password

						// $hash = "2y$2y$10";
						// $salt = "iusesomestrangecrazystrings";
						// $hash_salt = $hash . $salt;
						// $pass = crypt($pass,$hash_salt);


					// end of encrypting password


				// $query_hash = "SELECT hashSalt from users";

				// $query_exec = mysqli_query($conn,$query_hash);

				// if(!$query_exec){
				// 	die("Error with pulling hashSalt from admin side" . mysqli_error($conn));
				// }


				// while ($row = mysqli_fetch_assoc($query_exec)) {
				// 	$hashed = $row['hashSalt'];
				// }

				// $pass = crypt($pass, $row['hashSalt']);

					$pass = password_hash($pass, PASSWORD_BCRYPT, array('cost' => 12));





					move_uploaded_file($img_temp, "user_imgs/$img");	

					if ($username && $fname && $lname && $mail && $img && $pass && $role ) {
							$query_insert = "INSERT INTO users(username,firstname,lastname,password,repassword,email,user_img,Role) VALUES('$username', '$fname', '$lname', '$pass', '$pass', '$mail', '$img', '$role')";

							$query_result = mysqli_query($conn,$query_insert);

							if (!$query_result) {
								die("error with registering user" . mysqli_error($conn));	
							}

							echo "<img src='image/seen.png' class='img-responsive' width='40px;'/><p class='green-text'><b>Account created succesfully</b></p>";

							$last_id = mysqli_insert_id($conn);

							?>



							<a href="edit_user.php?edit_user=<?php echo $last_id ?>" class="green-text"><b>Edit User</b></a> | |

							<a class="purple-text" href="users.php"><b>View Users</b></a>

							<?php

						}else{
							echo "<img src='image/index.png' class='img-responsive center-align' width='30px;'/><p class='center-align grey lighten-3 red-text' style='padding:5px'><i><b>OOPS!</b></i><b> Please fill respective fields</b></p>";	
						}		
				}


			?>
	<!-- END OF REGISTERING A USER -->


<form method="post" action="add_user.php" enctype="multipart/form-data">

	<div class="input-field">
		<h6><b>USERNAME</b> <i class="material-icons right">account_circle</i></h6>
		<input type="text" id="cat-input" name="username" placeholder="Enter username">
	</div>	

	<div class="input-field" id="sel_input_div">
		<h6><b>Role Specification</b><i class="material-icons right">card_membership</i></h6>


		<!-- SELECT THAT PULLS ROLES -->
	<div class="input-field col s12 m4" >
    <select name="role_sel">
			<option disabled selected>Select Role</option>
    	
    		 <option  class=" circle">Admin</option>
    		 <option  class=" circle">Subscriber</option>


		

    </select>
  </div>
<!-- END OF SELECT THAT PULLS ROLES -->
</div>

	<div class="input-field">
		<h6><b>FIRST NAME</b><i class="material-icons right">assignment_ind</i></h6>
		<input type="text" id="cat-input" name="fname" placeholder="Enter firstname">
	</div>	


	<div class="input-field">
		<h6><b>LAST NAME</b><i class="material-icons right">assignment_ind</i></h6>
		<input type="text" id="cat-input" name="lname" placeholder="Enter lastname">
	</div>	

	<div class="input-field">
		<h6><b>EMAIL</b><i class="material-icons right">mail</i></h6>
		<input type="text" id="cat-input" name="mail" placeholder="Enter email">
	</div>	

	<div class="input-field">
		<h6><b>Passport</b><i class="material-icons right">key</i></h6>
		<input type="file" name="user_img"  id="cat-input">
	</div>	

	<div class="input-field">
		<h6><b>PASSWORD</b><i class="material-icons right">key</i></h6>
		<input type="text" id="cat-input" name="pass" placeholder="Enter password">
	</div>



	<div class="input-field">
		<button type="submit" id="pst-btn" name="reg_user" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Create Account</button>
	</div>

</form>	

</div>	

</div>	



</div>