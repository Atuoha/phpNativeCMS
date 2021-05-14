<?php
	
	include "includes/conn.php";

?>





<div >

<?php
	if(isset($_GET['source'])){
		$source = $_GET['source'];
	}else{
		$source = '';
	}

	switch ($source) {
		case 'addpost':
			include "add_post.php";
			break;

		case '3':
			echo "3 SWITCHED";
			break;	
		
		default:
			include "display_post.php"; 
			break;
	}

?>

</div>	

</div>