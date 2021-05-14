

<!-- RETRIEVING POST SPECIFIC POST WITH THE READ MORE BUTTON -->
<?php
    if(isset($_GET['viewPost'])){
        $view_id = $_GET['viewPost'];

        $query = "SELECT * FROM posts WHERE pst_id = '$view_id' AND pst_status = 'Published' ";

        $query_result = mysqli_query($conn,$query);


        $counting = mysqli_num_rows($query_result);

            if($counting == 0){

                if(isset($_SESSION['role']) && ($_SESSION['role']) == "Admin"){
                        $query = "SELECT * FROM posts WHERE pst_id = '$view_id'";
                         $query_result = mysqli_query($conn,$query);
                }else{
                    header("location:home.php");
                    echo "<h3 class='center-align red-text'><b>The post is longer available for view</b></h3>";
                }


            }



        // UPDATING POST VIEW COUNT

        $query_increment_view = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE pst_id = '$view_id' ";

        $exec_increment_view = mysqli_query($conn,$query_increment_view);

        if(!$exec_increment_view){
            die("Error with incrementing view count " . mysqli_error($conn));
        }

        // END OF  UPDATING POST VIEW COUNT






        if(!$query_result){
            die("SELECTING POST QUERY PROBLEM" . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($query_result)) {
                       $id = $row['pst_id']; 
                       $tit =  $row['pst_title'];
                       $sub =  $row['pst_sub_title'];
                       $author =  $row['pst_author'];
                       $date =  $row['pst_date'];
                       $img =  $row['pst_img'];
                       $con =  $row['pst_content'];
                       $tag =  $row['pst_tag'];
        }


?>
<!-- END OF RETRIEVING POST SPECIFIC POST WITH THE READ MORE BUTTON -->





    

<!-- CONTAINER FOR THE POST WITH SPECIFIC ID -->

    <div class="container" id="main-div"  >
        <div class="row">
            <div class="col l8 s12 m12 " >
                <span id="page-head"><b><?php echo $tit?></b></span>
                 <span class="grey-text" id="sub-text"><?php echo $sub?></span> 
                    <hr class="line">
                    <p><h5 class="light-blue-text text-accent-4">By 
<a href="authorPost.php?author=<?php echo $author ?> & p_id=<?php echo $id ?>"> <?php echo $author ?></a></h5></p>
                    <p><h6>for <span class="light-blue-text text-accent-4" ><?php echo $tag?></span></h6></p>

                    <span >Posted on:  <?php echo $date?></span>
                    <hr class="line">

                    <div>
                        <img class="materialboxed" data-caption="<?php  echo $tit; ?>" src="/CMS/imgs_upload/<?php echo $img?>" alt="html-image" id="img-single">
                    <hr class="line">

                    <p> <?php echo $con?>  </p> 
                    


                    <!-- comment -->
                    <hr class="line">

                     <br>
                    <div id="comment-div" class="grey lighten-4" >

                        







                        <!-- SENDING COMMENT -->
                        <?php

                            if(isset($_POST['send-message'])){
                                $com_name =  $_POST['comment-name'];
                                $com_mail = $_POST['comment-mail'];
                                $com_msg = $_POST['comment_msg'];
                                $date = date('Y-m-d h:i:sa');
                                $pst_idd =  $id; 

                                $com_msg = mysqli_real_escape_string($conn,$com_msg);

                               if($com_name && $com_mail && $com_msg){

                                $query = "INSERT INTO comment(pst_id, com_name, com_mail, com_msg, com_date) VALUES('$pst_idd', '$com_name', '$com_mail', '$com_msg',now()) ";

                                $query_res = mysqli_query($conn,$query);

                                if(!$query_res){
                                    die("QUERY PROBLEM WITH INSERTING COMMENT" . mysqli_error($conn));
                                }
                                    echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class='green-text'><b>$com_name | your comment has been sent succesfully <i>!</i> | </b></p>"; 

                               }else{
                                echo "<img src='image/index.png' class='img-responsive center-align' width='30px;'/><p class='red-text'><i><b>OOPS!</b></i><b> Please fill respective fields</b></p>";
                                ?>

                                <script>alert ("Fields cannot be empty!!");</script>

                                <?php
                               }
                            }


                            // INCREMENTING COMMENT COUNT DYNAMICALLY

                            // currently am not using this update method, am just counting the comments somehow using the Php count function because this is sending 2 at first to database instead of one, try and figure this out later ASAP!!!!!!!!!!
                            
                            $increComm_countQuery = "UPDATE posts SET pst_comment_count = pst_comment_count + 01  WHERE pst_id = '$view_id' ";

                            $resultIncreQuery = mysqli_query($conn,$increComm_countQuery);

                            if(!$resultIncreQuery){
                                die("COMMENT COUNT UPDATE FAILURE" . mysqli_error($conn));
                            }

                            // END OF INCREMENTING COMMENT COUNT DYNAMICALLY


                        ?>

                        <!-- END OF SENDING COMMENT -->


                        <!-- COMMENT FORM -->
                        <p class="p-top">Leave a Comment</p>
                        <form method="post" action="">
                            Name<br>
                            <input type="text" name="comment-name" id="input" placeholder="Name">
                            Email<br>
                            <input type="Email" name="comment-mail" id="input" placeholder="Email">
                            Your Comment<br>
                            <textarea type="text" name="comment_msg" id="inputs" placeholder="Comment" ></textarea>  
                            <button type="submit" id="abc" name="send-message" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">insert_comment</i>Comment</button> 
                        </form>
                        <br><br><br><br>
                        <!-- END OF COMMENT FORM -->




                               <!-- VIEWING COMMENTS -->

                <?php
                    if(isset($_GET['viewPost'])){
                        $view_id = $_GET['viewPost'];

                        $query = "SELECT * FROM comment WHERE pst_id = '$view_id' AND status ='approved' ORDER BY id DESC ";

                        $query_result = mysqli_query($conn,$query);

                        if(!$query_result){
                            die("SELECTING POST QUERY PROBLEM" . mysqli_error($conn));
                        }

                        while ($row = mysqli_fetch_assoc($query_result)) {
                                       $name = $row['com_name']; 
                                       $mail =  $row['com_mail'];
                                       $msg  = $row['com_msg'];
                                       $date = $row['com_date'];

                         ?>
                            

                    <!--SHOWING COMMENTS PREVIEW -->

                        <!--    <div class="card-panel grey lighten-4">
                              <div class="row valign-wrapper">
                                <div class="col s1">
                                  <img width="40px" src="image/default.png" alt="" class="circle responsive-img"> 
                                </div>
                                <div class="col s11">
                                  <span class="black-text">
                                    <b><?php echo $name?></b> | <?php echo $mail?> | at <?php echo $date ?> <br>
                                    <?php echo $msg?>
                                  </span>
                                </div>
                              </div>
                            </div> -->
                      
                     <!-- END OF SHOWING COMMENTS -->


                     <!-- new comment style -->
                 <div class="chip" style="margin-top: 20px;">
                    <img src="../image/default.png" alt="Contact Person">
                    <strong><b><?php echo $name?></b></strong> | <?php echo $mail?> | at <?php echo   date('d-m-Y  || h:i:a', strtotime ($date))?> <br class="hide-on-med-and-down"> <i class="hide-on-large-only"> | | </i>
                     <?php echo $msg?>
                  </div>
                    <!-- end of new comment style -->





                <!-- PREVIOUS COMMENT PREVEIW STYLE -->

                     <!--  <p><img width="40px;" class="circle"  src="image/default.png"><b><?php echo $name ."</b>" ." | ";  echo $mail . " |";?>  <i class='dat-itaxcs'> at <?php echo $date ?>  </i> .<br>  <?php echo "<i style='margin-left: 40px;'>".$msg . "</i>";?>  </p>
 -->
                <!-- END OF PREVIOUS COMMENT PREVEIW STYLE -->




                          

                         <?php              
                        }
                    }

        }


                ?>


                        <!-- END OF COMMENTS -->


                          <br><br><br>
                    </div>  

                    <!-- end of comment -->



                    

                    </div> 
                    <hr class="line">


            </div>    
           

           <!-- SIDE BAR INCLUDES -->

            <div>
          
<?php ob_start(); ?>

<div class="col l4 s12 m12">

                        <!-- BLOG SEARCH -->
                    <div class="grey lighten-4  z-depth-1" id="log-div">
                        <p class="p-top">Blog Search</p>
                        <form method="post" action="search.php">
                            <input type="text" name="search" id="search" placeholder="Enter Post Title Keyword">
                            <button type="submit" name="searchBtn" id="abc" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">search</i>Search</button>
                        </form>
                    </div>

                    <!-- END OF BLOG SEARCH -->


                    <div class="grey lighten-4  z-depth-1" id="log-divs">
                         <!-- LOGIN -->
                                <?php
                                    if(isset($_POST['login_btn'])){
                                        $user = $_POST['username'];
                                        $pass =  $_POST['pass'];

                                         $user = mysqli_escape_string($conn,$user);
                                         $pass = mysqli_escape_string($conn,$pass);


                                        if($user && $pass){

                                         $check_username_query = "SELECT * FROM users WHERE username = '{$user}'  ";

                                         // AND user_status = 'Authorized'
                                         
                                         $exec_check_username = mysqli_query($conn,$check_username_query);

                                         if(! $exec_check_username){
                                            die("Error with Login -username side (DATABASE!!)" . mysqli_error($conn));
                                         }


                                         // $check_pass_query = "SELECT * FROM users WHERE password = '{$pass}' ";

                                         // $exec_check_pass = mysqli_query($conn,$check_pass_query);

                                         // if(!$exec_check_pass){
                                         //    die("Error With Login -password Side(DATABASE!!)");
                                         // }

                                         while ($row = mysqli_fetch_assoc($exec_check_username)) {
                                              $username_db = $row['username'];  
                                              $userpass_db = $row['password'];
                                              $role_db = $row['Role'];
                                              $firstname_db = $row['firstname'];
                                              $lastname_db = $row['lastname'];
                                              $img_db = $row['user_img'];
                                              $status_db = $row['user_status'];
                                              $mail = $row['email'];
                                              $user_id = $row['user_id'];

                                         }


                                        if($user === $username_db && $pass === $userpass_db){

                                            $_SESSION['username'] = $username_db;
                                            $_SESSION['pass'] = $userpass_db;
                                            $_SESSION['role'] = $role_db;
                                            $_SESSION['firstname'] = $firstname_db;
                                            $_SESSION['lastname'] = $lastname_db;
                                            $_SESSION['user_img'] = $img_db;
                                            $_SESSION['user_status'] = $status_db;
                                            $_SESSION['user_mail'] = $mail;
                                            $_SESSION['user_id'] = $user_id;




                                           // header("location:Admin");
                                   
                                         }elseif($user == $username_db && $pass !== $userpass_db){
                                            echo "<p class='deep-orange-text text-darken-4'  id='error_error'><i><b>OOPS!!!</i></b> Password Incorrect</p>";
                                         }else{
                                            header("location:home.php");
                                         }


                                        }else{
                                            echo "<img src='image/index.png' class='img-responsive center-align' width='30px;'/><p class='red-text'  id='error_error'><i><b>OOPS<i>!!</i></b></i><bif(!$> Enter Login details please</b></p>";
                                        }
                                    }
                                ?>

                            <!-- END OF LOGIN -->

                            
                            <!-- LOGIN DETAILS WHEN LOGGED IN -->

                          <?php
                        if(isset($_SESSION['role'])){
                            ?>
                                <p class="p-top">Admin Logged in!</p>    
                            <?php
                           echo "You are currently logged in as:" . " <br><b> " .  $_SESSION['firstname'] . " " . $_SESSION['lastname'] . " | " . $_SESSION['username'] . " |</b>";

                           ?>

                           <br><br>
                            <a  id="abc" href="includes/logout.php"class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">exit_to_app</i>Logout</a> 

                       <?php     
                        }else{
                          ?>
                               <p class="p-top">Admin Login</p>    
                        <form method="post">
                            <input type="text" name="username" id="search" placeholder="Username">
                            <input type="Password" name="pass" id="search" placeholder="Password">

                            <button  id="abc" name="login_btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">verified_user</i>Login</button> 
                        </form>
                       <?php   
                        }

                      ?>



                        <!-- LOGIN DETAILS WHEN LOGGED IN -->   


                        
                    </div>
    

                    <div class="grey lighten-4 z-depth-1" id="log-divs">
                        <p class="p-top center-align">Blog Contents</p>

                        <!-- PULLING CATEGORIES -->
                        <?php
                    $query = "SELECT * FROM categories";
                    $select_all = mysqli_query($conn,$query);

                    while ($row  = mysqli_fetch_assoc($select_all)) {
                        $cat_id = $row['cat_id'];
                        $content = $row['cat_title'];

                    ?>

                     <div class="col l6 s12">
                    <ul>
                        <li><a href="cat_post.php?catPost=<?php echo $cat_id;?>"><?php echo $content; ?></a>
                        </li>
                                        
                         </ul>    
                    </div> 

                    <?php
                    }
                ?>
                 <!-- END PULLING CATEGORIES -->
                         

                    </div>

                     <?php include "includes/widget.php";?>

 

            </div> 

















<style>
    #cat-row{
    }


</style>            
        </div>
            
            <!-- END OF SIDE BAR INCLUDES -->

        </div>



   </div>     
<!-- END OF BODY