<?php
	include "includes/head.php";
  include "Admin/function.php";
	ob_start();

?>




	<div class="container">
	<div class="container grey lighten-5 z-depth-1" id="reg">
		
	<div class="center-align">	
	<img src="/CMS/image/avatar.png">	
	</div>

	<ul id="tabs-swipe-demo" class="tabs">
    <li class="tab col s3"><a  href="#test-swipe-2"><b>Register</b></a></li>
    <li class="tab col s3"><a  href="#test-swipe-1"><b>Login</b></a></li>
   
  </ul>
  <div id="test-swipe-1" class="col s12 ">

<br>
<p class="center-align deep-orange-text text-lighten-3"><b>Login</b></p>
  		
  		 <!-- LOGIN -->
                 <?php login_user()?>
         <!-- END OF LOGIN -->

		

		<form method="post" action="#test-swipe-1">
			<div class="row">
			<div class="input-field">
				<input type="text" name="username" id="user" placeholder="Username">
				<label class="lab" for="user"><i class="material-icons " >account_circle</i></label> 
			</div>	

			

			<div class="input-field">
				<input type="password" name="pass" id="user" placeholder="********">
				<label class="lab" for="user"><i class="material-icons " >lock</i></label> 
			</div>
      <a href="forgot.php?forgot=<?php echo uniqid(true) ?>">Forgot password?</a>	

			<div class="input-field right-align">
				<button type="submit" id="abc" name="login_btn" class=" deep-orange lighten-3 waves-effect white-text waves-light hoverable"><i class="material-icons right ">verified_user</i>Login</button> 

        
			</div>



			</div>
			</div>


		</form>		



  <div id="test-swipe-2" class="col s12 ">
<br>


<p class="center-align deep-orange-text text-lighten-3"><b>Register</b></p>


  <!-- REGISTERING AN ADMIN -->



      <?php register_user() ?>

      <!-- END OF REGISTERING AN ADMIN -->
  



		<form method="post" action="register.php" enctype="multipart/form-data">
			<div class="row">

			<div class="col m6 s12">

			<div class="input-field">
				<input type="text" name="user" id="user" placeholder="Username" autocomplete="on">

				<label class="lab" for="user"><i class="material-icons " >account_circle</i></label> 
			</div>	

			<div class="input-field">
				<input type="email" name="mail" id="user" placeholder="Email">
				<label class="lab" for="user"><i class="material-icons " >mail</i></label> 
			</div>	
			

			<div class="input-field">
				<input type="password" name="pass" id="user" placeholder="********">
				<label class="lab" for="user"><i class="material-icons " >lock</i></label> 
			</div>	

			<!-- <div class="input-field">
				<input type="password" name="repass" id="user" placeholder="********">
				<label class="lab" for="user"><i class="material-icons " >lock</i></label> 
			</div>	 -->

			<div class="input-field hide-on-med-and-down">
				<button type="submit" id="abc" name="btn-reg" class=" deep-orange lighten-3 waves-effect white-text waves-light hoverable"><i class="material-icons right ">verified_user</i>Register</button> 
			</div>

			</div>	


			<div class="col m6 s12">
			
				<div class="input-field">
				<input type="text" name="fname" id="user" placeholder="First Name">
				<label class="lab" for="user"><i class="material-icons " >assignment_ind</i></label> 
			</div>	

			<div class="input-field">
				<input type="text" name="lname" id="user" placeholder="Last Name">
				<label class="lab" for="user"><i class="material-icons " >assignment_ind</i></label> 
			</div>	
			

			<div class="input-field">
				<input type="File" id="img_upload" name="user_img">	 
			</div>	

			<div class="input-field hide-on-large-only">
			<button type="submit" id="abc" name="btn-reg" class=" deep-orange lighten-3 waves-effect white-text waves-light hoverable"><i class="material-icons right ">verified_user</i>Register</button> 
			</div>

			</div>	
			

			



			</div>
			</div>



		</form>		



	</div>

</body>
</html>