<?php
	include "head.php";
	include "includes/conn.php";
	include "includes/delete_contact.php";
?>

<?php ob_start();?>

<?php
	
	if(!is_admin($_SESSION['username'])){
		header("location:index.php");
	}



?>


<div  class="mainContainer">
<div class="center-align">

<h2 class="center-align">
	<img src="image/contact.png" alt="Some-image" width="150px;">
</h2>
</div>	



<div id="post-div">

	<?php include "includes/display_contact_message.php";?>


</div>

</div>