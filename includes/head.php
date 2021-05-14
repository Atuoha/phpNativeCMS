<?php
    include "includes/conn.php";
    session_start(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>PHP CMS</title>
<!-- <link rel="stylesheet" href="bootstrap4/css/">-->
    <link rel="stylesheet" href="/CMS/css/materialize.min.css">
    <link rel="stylesheet" href="/CMS/css/demos.css">
    <link rel="stylesheet" href="/CMS/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/CMS/iconfont/material-icons.css">
    <link rel="icon" href="/CMS/image/m1.png" />
    <script src="/CMS/javascript/jquery-2.1.3.min.js"></script>
    <script src="/CMS/javascript/materialize.min.js"></script>
    <script src="/CMS/javascript/main.js"></script>
    </head>
<body>

    <!-- NAV  -->
    <div class="navbar-fixed">
    <nav>

        <div class="nav-wrapper grey darken-4">
            <a class="brand-logo right hide-on-med-and-down" id="b"><b>PHP CMS</b></a>
            <a class="brand-logo left hide-on-large-only" id="b"><b>PHP CMS</b></a>
            <a class="button-collapse right" data-activates="mobile"><i class="material-icons">menu</i></a>

            <div class="container">
            <ul class="hide-on-med-and-down" id="list">
                <li class="list active nav_list"><a href="/CMS/home.php">Home</a></li>

                <?php
                    $query = "SELECT * FROM categories";
                    $select_all = mysqli_query($conn,$query);

                    while ($row  = mysqli_fetch_assoc($select_all)) {
                        $cat_id = $row['cat_id'];
                        $content = $row['cat_title'];

                        $cat_class = '';
                        $reg_class = '';
                        $con_class = '';

                        $pagename = basename($_SERVER['PHP_SELF']);

                        $register_page = "register.php";
                        $contact_page = "contact.php";

                        if(isset($_GET['categores']) && ($_GET['categores']) == $cat_id){
                            $cat_class = 'active';
                        }else if($pagename == $register_page){
                            $reg_class = 'active';
                        }else if($pagename == $contact_page){
                            $con_class = 'active';

                        }
                    ?>


                    <li class="list nav_list <?php echo $cat_class?>"><a href="/CMS/cat_post/<?php echo $cat_id;?>"><?php echo $content; ?></a></li>

                    <?php
                    }
                ?>
             
                <li class="list <?php echo $reg_class?>"><a href="/CMS/register">Register</a></li>
                <li class="list <?php echo $con_class?>"><a href="/CMS
                /contact">Contact</a></li>

                <?php
                    if(isset($_SESSION['role'])){
                        ?>
                         <li><a href="/CMS/Admin">Admin</a></li>
                    <?php
                    }
                ?>
               

                
                <?php
                    if(isset($_SESSION['role'])){
                        if(isset($_GET['viewPost'])){
                            $editPost_id = $_GET['viewPost'];
                            ?>

                    <li><a href='/CMS/Admin/edit_post.php?edPost=<?php echo $editPost_id ?>'>Edit post</a></li>
                    <?php
                        }
                    }
                ?>

            </ul>  
            </div>

            <ul  id= "mobile" class="side-nav" > 
            
                <li><a href="home.php">Home</a></li>
                
                <?php
                    $query = "SELECT * FROM categories";
                    $select_all = mysqli_query($conn,$query);

                    while ($row  = mysqli_fetch_assoc($select_all)) {
                        $cat_id = $row['cat_id'];
                        $content = $row['cat_title'];

                    ?>

                    <li class="list"><a href="cat_post.php?catPost=<?php echo $cat_id;?>"><?php echo $content; ?></a></li>

                    <?php
                    }
                ?>

                    <li><a href="/CMS/contact">Contact</a></li>
                <li><a href="/CMS/register">Register</a></li>
                <?php
                    if(isset($_SESSION['role'])){
                        ?>
                         <li><a href="/CMS/Admin">Admin</a></li>
                    <?php
                    }
                ?>
               

                
                <?php
                    if(isset($_SESSION['role'])){
                        if(isset($_GET['viewPost'])){
                            $editPost_id = $_GET['viewPost'];
                            ?>

                    <li><a href='/CMS/Admin/edit_post.php?edPost=<?php echo $editPost_id ?>'>Edit post</a></li>
                    <?php
                        }
                    }
                ?>
            </ul>    
        </div>
    </nav>
</div>


<!-- END OF NAV  -->