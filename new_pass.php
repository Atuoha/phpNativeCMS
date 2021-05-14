<?php
	include "includes/head.php";
	include "includes/conn.php";
	include "Admin/function.php";

?>


	
<div class="container">
<div class="container grey lighten-5 z-depth-1" id="forgot-div">

			<?php



				if(isset($_GET['Email']) && isset($_GET['Token'])){
					$email_id = $_GET['Email'];
					$token = $_GET['Token'];
				}else{
					header("location:home");
				}

				// $token = '54a91d24f8c613d222032ba89b02f3e2861efd147d169863ec2536e21c5bf8e435a31c94c897f59c49b68e566f1a9f240d15';

				$query_fetch = mysqli_prepare($conn,"SELECT username,email,token FROM users WHERE token = ? ");

				mysqli_stmt_bind_param($query_fetch,'s',$token);
				mysqli_stmt_execute($query_fetch);
				mysqli_stmt_bind_result($query_fetch,$username,$mail,$token);
				mysqli_stmt_fetch($query_fetch);
				mysqli_stmt_close($query_fetch);

				
			?>
	

		<h5 class="center-align"><b><i class="material-icons large ">lock</i></b></h5>
		<h4 class="center-align"><b>Reset Password?</b></h4>
		<p class="center-align">You can reset your password here.</p>

		<form method="post">
			<?php
					echo "<p class='purple-text right-align'><i>$mail</i></p>";
				if(isset($_POST['reset-btn'])){
					$pass = $_POST['pass'];
					$repass = $_POST['repass'];

					if(empty($pass) && empty($repass)){
					echo "<p class='red-text' ><i><b>OOPS!</b></i> Fields can not be empty</p>";
					}elseif($pass === $repass){

							$update_query = mysqli_prepare($conn,"UPDATE users SET token ='' , password = ? WHERE email = ?");

							mysqli_stmt_bind_param($update_query,'ss',$pass,$mail);
							mysqli_stmt_execute($update_query);

							echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><b>Password saved successfully!</b></p>";

							echo "<a class='green-text' href='register.php/#test-swipe-1'><i>Login now!</i></a>";
					}else{
						echo "<p class='red-text'><b>Password mismatch!</b></p>";
					}
				}


			?>
			

			<div class="input-field">
				<input  id="funame" type="password" name="pass" placeholder="Enter new password" class="input">
				<label for="name"><i class="material-icons">lock</i></label>
			</div>

			<div class="input-field">
				<input  id="funame" type="password" name="repass" placeholder="Confrim password" class="input">
				<label for="name"><i class="material-icons">check_circle</i></label>
			</div>	

			

			<div class="input-field ">
				<button type="submit" id="forgot-btn" name="reset-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">autorenew</i>Reset Password</button>
			</div>
			<p class="right-align grey-text text-lighten-1" style="font-family: monospace;"><i>Check your mail after this!</i></p>

		
	</div>
	
	</div>	

