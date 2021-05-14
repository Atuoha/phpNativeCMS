<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Section</title>
	<link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="iconfont/material-icons.css">
    <link rel="icon" href="image/avatar.png" />
    <script src="javascript/jquery-2.1.3.min.js"></script>
    <script src="javascript/materialize.min.js"></script>
    <script src="javascript/main.js"></script>
    <script src="Bar-Chart-jQuery-Graphite/main.js"></script>
    <script src="Bar-Chart-jQuery-Graphite/graphite.js"></script>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- <script type="text/javascript" src="javascript/jquery.tinymce.min.js"></script> -->
     <script type="text/javascript" src="javascript/script.js"></script>
</head>

<?php include "includes/conn.php"; ?>
<?php include "function.php"; ?>




<?php ob_start();?>
<?php session_start();?>

<?php 
    if(!isset($_SESSION['role'])){
        // if($_SESSION['role'] !== 'Admin' ){
            header("location:../home.php");
        // }
    }
    
    if($_SESSION['role'] == 'user'){
        header("location:../home.php");
    }

?>




<!-- Checking Users Online -->

   
<!-- End of checking users online -->


