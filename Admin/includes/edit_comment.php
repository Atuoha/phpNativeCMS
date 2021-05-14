<?php
	include "head.php";
	include "includes/conn.php";
?>
<?php ob_start();?>


<div  class="mainContainer">
<h2 class="center-align">
	<img src="image/delpost.png" alt="Some-image" width="150px;">
</h2>


<?php
	if(isset($_GET['editCmt'])){
		$ed_id = $_GET['editCmt'];

		echo $ed_id;
	}	


?>

<div class="container" id="add_post_con">


</div>	
















</div>	









