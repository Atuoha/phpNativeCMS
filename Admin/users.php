<?php
	include "head.php";
	include "includes/conn.php";
	ob_start();
?>

<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/us.png" alt="Some-image" width="150px;">
</h2>
</div>	



<?php
	
	if(!is_admin($_SESSION['username'])){
		header("location:index.php");
	}



?>






	<?php
		if(isset($_POST['checkbox'])){
			foreach ($_POST['checkbox'] as $user_id) {

				$select_options = $_POST['select_options'];

				switch ($select_options) {
					case 'admin':
							$query_admin = "UPDATE users SET Role = 'Admin' WHERE user_id = '$user_id' ";

								$admin_exec = mysqli_query($conn,$query_admin);

								if(!$admin_exec){
									die("Error with updating user to admin" . mysqli_error($conn));
								}
						break;


						case 'sub':
							$query_sub = "UPDATE users SET Role = 'Subscriber' WHERE user_id = '$user_id' ";

								$sub_exec = mysqli_query($conn,$query_sub);

								if(!$sub_exec){
									die("Error with updating user to Subscriber" . mysqli_error($conn));
								}
						break;


							case 'user':
							$query_user = "UPDATE users SET Role = 'User' WHERE user_id = '$user_id' ";

								$user_exec = mysqli_query($conn,$query_user);

								if(!$user_exec){
									die("Error with updating user to Subscriber" . mysqli_error($conn));
								}
						break;



						case 'auth':
							$query_auth = "UPDATE users SET user_status = 'Authorized' WHERE user_id = '$user_id' ";

								$auth_exec = mysqli_query($conn,$query_auth);

								if(!$auth_exec){
									die("Error with updating user to Authorized" . mysqli_error($conn));
								}
						break;



						case 'unauth':
							$query_unauth = "UPDATE users SET user_status = 'Unauthorized' WHERE user_id = '$user_id' ";

								$unauth_exec = mysqli_query($conn,$query_unauth);

								if(!$unauth_exec){
									die("Error with updating user to Unauthorized" . mysqli_error($conn));
								}
						break;


						case 'delete':
							$query_del = "DELETE FROM users WHERE user_id = '$user_id' ";

								$del_exec = mysqli_query($conn,$query_del);

								if(!$del_exec){
									die("Error with deleting User" . mysqli_error($conn));
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
    <select name="select_options">
			<option disabled selected value="none">Select options</option>
    	
    		  <option  class=" circle" value="admin">Admin</option>
    		 <option  class=" circle" value="sub">Subscriber</option>
    		 <option  class=" circle" value="user">User</option>
    		 <option  class=" circle" value="auth">Authorize</option>
    		 <option  class=" circle" value="unauth">Unauthorize</option>
    		 <option  class=" circle " value="delete">Delete</option>


    </select>
  </div>


<button type="submit"   id="pst-btn" name="activate_btn" class="actionPerform light-green accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">assignment_turned_in</i>Apply</button>


<a href="add_user.php" id="pst-btn" name="pst-btn" class="  light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">add_circle</i>Add New</a>


<table class="higlight responsive-table">
	<thead>
		<tr>
		<th><input type="checkbox" id="select_all" >
			<label for="select_all"></label>
		</th>	
		<th>ID</th>
		<th>USERNAME</th>
		<th>FIRSTNAME</th>
		<th>LASTNAME</th>
		<th>EMAIL</th>
		<th>PASSWORD</th>
		<th>PROFILE CAPTURE</th>
		<th>ROLE</th>
		<th>USER STATUS</th>
		<!-- <th>AUTHORIZE</th> -->
		<!-- <th>UNAUTHORIZE</th> -->
		<!-- <th>Admin</th> -->
		<!-- <th>Subscriber</th> -->
		<th>EDIT</th>
		<!-- <th>REMOVE</th> -->
		</tr>
	</thead>	


	<tbody>
		


			<!-- PULLING USER DATA FROM DATABASE -->

			<?php
				$query = "SELECT * FROM users ORDER BY user_id DESC";

				$res_query = mysqli_query($conn,$query);
				if(!$res_query){
					die("ERROR WITH PULLING USERS DATA" . mysqli_error($conn));

				}

				while ($row = mysqli_fetch_assoc($res_query)) {
					$id = $row['user_id'];
					$username = $row['username'];
					$fname = $row['firstname'];
					$lname = $row['lastname'];
					$email = $row['email'];
					$img = $row['user_img'];
					$pass = $row['password'];
					$accLevl = $row['Role'];
					$user_status = $row['user_status'];
			?>
			<tr>
			<td>
				<input type="checkbox" id="<?php echo $id ?>" class="checkboxes" value="<?php echo $id ?>" name="checkbox[]">
				<label for="<?php echo $id ?>"></label>	
			</form>
			</td>
			<td><?php echo $id ?></td>
			<td><?php echo $username ?></td>
			<td><?php echo $fname ?></td>
			<td><?php echo $lname ?></td>
			<td><?php echo $email ?></td>
			<td><?php echo $pass ?></td>
			<td><img class="circle materialboxed" width="70px" data-caption="<?php echo $fname." " . $lname. "  | " . $username . " |" ?>" src="/cms/Admin/user_imgs/<?php echo $img ?>"> </td>
			<td><?php echo $accLevl ?></td>
			<td><?php echo $user_status ?></td>
		<!-- 	<td><a href="users.php?auth=<?php echo $id ?>" class="green-text"> <b>authorize</b></a></td> -->
			<!-- <td><a href="users.php?unauth=<?php echo $id ?>" class="orange-text"> <b>unauthorize</b></a></td> -->
			<!-- <td><a href="users.php?admin=<?php echo $id ?>" class="teal-text"><b>Admin</b></a></td>
			<td><a href="users.php?sub=<?php echo $id ?>" class="brown-text"><b>Subscriber</b></a></td> -->
		

			<td><a  class=" edit-cat-btn green waves-effect waves-light hoverable" href="edit_user.php?edit_user=<?php echo $id ?>" class="white-text"><i class="material-icons hide-on-large-only ">playlist_add_check</i><i class="hide-on-med-and-down">Update</i></a></td>


		<!-- 	<td><a href="users.php?delUser=<?php echo $id ?>" class="red-text"><b>remove</b></a></td> -->
			</tr>	
			<?php

				}
			?>
		
	</tbody>	
	




</table>

</div>
</div>




<!-- AUTHORIZE USER -->
	
	<?php

		if (isset($_GET['auth'])) {
			$auth_id = $_GET['auth'];

			$auth_query = "UPDATE users SET user_status = 'Authorized' WHERE user_id = '$auth_id' ";

			$res_auth = mysqli_query($conn,$auth_query);
			if (!$res_auth) {
				die("ERROR WITH UPDATING USER WITH AUTHORIZE" . mysqli_error($conn));
			}

			header('location:users.php');
		}
	?>
	
<!-- END OF AUTHORIZE USER -->




<!-- UNAUTHORIZE USER -->

	<?php
		if(isset($_GET['unauth'])){
			$unauth_id = $_GET['unauth'];

			$unauth_query = "UPDATE users SET user_status = 'Unauthorized' WHERE user_id = '$unauth_id' ";

			$res_unauth = mysqli_query($conn,$unauth_query);

			if(!$res_unauth){
				die("ERROR WITH UPDATING USER WITH UNAUTHORIZE" . mysqli_error($conn));
			}

			header("location:users.php");
		}

	?>


<!-- END OF UNAUTHORIZE -->





<!-- DELETE USER -->

	<?php
		if (isset($_GET['delUser'])) {
			

			if(isset($_SESSION['role'])){
				if(isset($_SESSION['role']) == 'Admin'){
					$del_id = mysqli_real_escape_string($conn, $_GET['delUser']);

					$del_query = "DELETE FROM users WHERE user_id = '$del_id' ";

					$res_del = mysqli_query($conn,$del_query);

					if (!$res_del) {
						die("ERROR WITH DELETING USER" . mysqli_error($conn));
					}

					header("location:users.php");
				}
			}

			
		}


	?>


<!-- DELETE USER -->



<!-- CHANGE USER ROLE TO ADMIN -->
	<?php
		if (isset($_GET['admin'])) {
			$admin_change_id = $_GET['admin'];

			$query_updateRole = "UPDATE users SET Role = 'Admin' WHERE user_id = '$admin_change_id' ";

			$exec_update = mysqli_query($conn,$query_updateRole);

			if(!$exec_update){
				die("Error with Role update to admin" . mysqli_error($conn));
			}

			header("location:users.php");
		}


	?>
<!--END OF CHANGE USER ROLE TO ADMIN  -->


	<!-- CHANGE USER ROLE TO Subscriber -->
	<?php
		if (isset($_GET['sub'])) {
			$sub_id = $_GET['sub'];

			$query_updateRole = "UPDATE users SET Role = 'Subscriber' WHERE user_id = '{$sub_id}' ";

			$exec_update = mysqli_query($conn,$query_updateRole);

			if(!$exec_update){
				die("Error with Role update to Subscriber" . mysqli_error($conn));
			}

			header("location:users.php");
		}


	?>
<!--END OF CHANGE USER ROLE TO Subscriber  -->



