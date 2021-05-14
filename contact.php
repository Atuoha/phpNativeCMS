<?php
	include "includes/head.php";
	include "includes/conn.php";
?>


		



	<div class="container">
	<div class="container grey lighten-5 z-depth-1" id="con-div">


		<!-- SENDING CONTACT MESSAGE TO DATABASE -->
		<?php
			if(isset($_POST['con-btn'])){
				$con_name = $_POST['con-name'];
				$con_mail = $_POST['con-mail'];
				$con_msg = $_POST['con-msg'];
				$date = date('Y-m-d h:i:sa');

				// SENDING CONTACT MESSAGE TO MAIL

					// $to = "atuohainitiatives@gmail.com";
					// $subject = $_POST['con-mail'];
					// $body = $_POST['con-msg'];
					// $header = "From:" . $_POST['con-name'];

					// mail($to,$subject,$body,$header);

				// END OF SENDING CONTACT MESSAGE TO MAIL



				if($con_name && $con_mail && $con_msg){
					
					$query = "INSERT INTO contact(name,email,msg,date) VALUES('$con_name', '$con_mail', '$con_msg',now())";
					
					$result_contact = mysqli_query($conn,$query);

					if(!$result_contact){
						die('CONTACT QUERY PROBLEM' . mysqli_error($conn));
					}		

					echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><b>Message sent succesfully</b></p>";

				}else{
			echo "<img src='image/index.png' class='img-responsive center-align' width='30px;'/><p class='red-text grey lighten-3' style='padding:5px;border-radius:10px;' id='error'><i><b>OOPS!</b></i><b> Please fill respective fields</b></p>";

				}

			}

		?>

<!-- END OF SENDING CONTACT MESSAGE TO DATABASE -->
		<h5 class="right-align"><b><i class="material-icons right ">contacts</i>Contact</b></h5>

		<form method="post" action="contact.php">

			<div class="input-field">
				<input  id="funame" type="email" name="con-name" placeholder="Enter Mail" class="input">
				<label for="name"><i class="material-icons">mail</i></label>
			</div>

			<div class="input-field">
				<input  id="mail" type="text" name="con-mail" placeholder="Enter Subject" >
				<label for="mail"><i class="material-icons">format_color_text</i></label>
			</div>


				<div class="input-field">
				<textarea id="msg" type="email" name="con-msg" placeholder="Enter Message" ></textarea>  
				<label for="msg"><i class="material-icons medium">question_answer</i></label>
			</div>

			<div class="input-field right-align">
				<button type="submit" id="contact-btn" name="con-btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">message</i><b>Send</b></button>
			</div>


	</div>
	
	</div>	

