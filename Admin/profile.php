<?php
	include "head.php";
	include "includes/conn.php";

?>

<div  class="mainContainer" id="profile_div">
<div class="center-align">

<h2 class="center-align">
	<img src="image/vT.png" alt="Some-image" width="150px;">
</h2>
</div>	

<?php
	$cur_user = $_SESSION['user_id'];
	$query = "SELECT * FROM users WHERE user_id = '$cur_user' ";

	$exec_query = mysqli_query($conn,$query);

	if(!$exec_query){
		die("ERROR WITH PULLING DATA" .mysqli_error($conn));
	}

	while ($row = mysqli_fetch_assoc($exec_query)) {
		$username = $row['username'];
		$user_mail = $row['email'];
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$role = $row['Role'];
		$pass = $row['password'];
		$user_img = $row['user_img'];

	}


?>



 <div class="row">

        <div class="col l5 s12 ">
        	<!-- <p><?php echo $_SESSION['user_id'];?></p> -->
        <p><i class="material-icons right">account_circle</i><h5><b>USERNAME:</b></h5><h6> <?php echo $username ?></h6></p>
        <p><i class="material-icons right">mail</i><h5><b>MAIL:</b></h5><h6>  <?php echo   $user_mail; ?></h6> </p>
        <p><i class="material-icons  right">assignment_ind</i><h5><b>FIRSTNAME:</b></h5><h6>  <?php echo  $firstname?></h6> </p>
        <p><i class="material-icons  right">assignment_ind</i><h5><b>LASTNAME:</b></h5><h6>  <?php echo   $lastname ?></h6> </p>
        <p><i class="material-icons  right">card_membership</i><h5><b>ROLE:</b></h5><h6>   <?php echo   $role ?></h6></p>
        <p><i class="material-icons  right">lock</i><h5><b>PASSWORD:</b></h5><h6><?php echo   $pass?></h6> </p>
        
        
        </div>

        <div class="col l7 s12  passport-div">

        <p id="pass_para" class="center-align"><img  id="user_img" src="user_imgs/<?php echo $user_img ?>" class="circle materialboxed" data-caption="<?php echo $username?>"  alt="some-image"> </p>
        </div>



</div>
      
<a  id="pst-btn" href="edit_profile.php?edit_user=<?php echo $_SESSION['user_id'];?>" class="pst-btn light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">assignment_ind</i>Edit Details</a>






</div>



