<?php

session_start();
ob_start();

$_SESSION['username'] = null;
$_SESSION['pass'] = null;
$_SESSION['role'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_img'] = null;
$_SESSION['user_status'] = null;

header("location:../../home.php");


?>