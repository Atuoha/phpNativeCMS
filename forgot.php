<?php
	include "includes/head.php";
	include "includes/conn.php";
	include "Admin/function.php";

?>

<?php
	require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
	require './vendor/autoload.php';
	require './classes/config.php';

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
?>

	
<div class="container">
<div class="container grey lighten-5 z-depth-1" id="forgot-div">

	<?php
		if(!isset($_GET['forgot'])){
			header("location:/CMS");
		}

	?>			



		

			<!-- END OF SENDING CONTACT MESSAGE TO DATABASE -->
					<?php
		if(ifitismethod('post')){

			if(isset($_POST['for-btn'])){

			$mail = $_POST['mail'];

			$length = 50;

			$token = bin2hex(openssl_random_pseudo_bytes($length));

			if(empty($mail)){
				echo "<p class='red-text' ><i><b>OOPS!</b></i> Email can not be empty</p>";
			}else{

				$query = mysqli_query($conn,"SELECT * from users WHERE email LIKE '%$mail%' ");

				while($row = mysqli_fetch_assoc($query)){
					$u_mail = $row['email'];
					$u_user = $row['username'];
					$u_pass = $row['password'];
				}

				// echo $u_mail . "<br>" . $u_user . "<br>" . $u_pass;

				$count = mysqli_num_rows($query);

				if($count == 0){
					echo "<p class='red-text' ><i><b>OOPS!</b></i> User Email can not be found</p>";
				}else{

					$query_update = mysqli_prepare($conn,"UPDATE users SET token ='{$token}' WHERE email = ? ");

					mysqli_stmt_bind_param($query_update,"s",$mail);
					mysqli_stmt_execute($query_update);


					/*
						PHPMAILER CONFIGURATION
							
					*/ 

					// header("location:new_pass.php");

						$mail = new PHPMailer(true);

						try {
					    //Server settings
					    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
					    $mail->isSMTP();                                            // Send using SMTP
					    $mail->Host       = config::SMTP_HOST;                    // Set the SMTP server to send through
					    $mail->Username   = config::SMTP_USER;                     // SMTP username
					    $mail->Password   = config::SMTP_PASSWORD;                               // SMTP password
					    $mail->Port       = config::SMTP_PORT;                                    // TCP port to connect to
					    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
					    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

					        //Recipients
					    $mail->setFrom('atuohainitiatives@gmail.com', 'Atutechs Corp');
					    $mail->addAddress($u_mail);     // Add a recipient
					    $mail->addCC('atuohainitiatives@gmail.com');
					    $mail->addAttachment('image/mail.png');    // Optional name
					    
					     // Content
					    $mail->isHTML(true);                                  // Set email format to HTML
					    $mail->Charset = 'UTF-8';
					    $mail->Subject = 'Forgot password';
					    $mail->Body    = '<p>This mail was sent in reflection to the forgot password action you made on your platfrom, we wish to serve you better through our services.</p><a  href="http://localhost/cms/new_pass.php?Email='. $u_mail .'&Token='. $token .'  "><i>href="http://localhost/cms/new_pass.php?Email='. $u_mail .'         &Token=       '. $token .'  "<i></a>';
					

					    $mail->send();
						  $sent = true;


						 
						    
						} catch (Exception $e) {
						    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
						}


				}
			}

		}

		}
		

	?>	
				



<?php if(!isset($sent)):  // THIS IS USED TO DISPLAY A MESSAGE IN THE WHOLE CONTAINER WHEN THE ACTION IS SUCCESFFUL               ?>                                


		<h5 class="center-align"><b><i class="material-icons large ">lock</i></b></h5>
		<h4 class="center-align"><b>Forgot Password?</b></h4>
		<p class="center-align">You can reset your password here.</p>

		<form method="post">

			

			<div class="input-field">
				<input  id="funame" type="email" name="mail" placeholder="Enter your mail" class="input">
				<label for="name"><i class="material-icons">mail</i></label>
			

			</div>

			

			<div class="input-field ">
				<button type="submit" id="forgot-btn" name="for-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">autorenew</i>Reset Password</button>
			</div>
			<p class="right-align grey-text text-lighten-1" style="font-family: monospace;"><i>Check your mail after this!</i></p>

		<?php else: ?>
			<img src="image/seen.png" class="img-responsive center-align" width="40px;"/><b class="green-text"><h5><code>Message has been sent to your mail. Check now!!</code></h5></b>

		<?php endif; ?>	

	</div>
	
	</div>	

