<?php include "includes/conn.php";
      include "includes/head.php";
?>



    <div class="container" id="main-div"  >
        <div class="row">
            <div class="col l8 s12 m12 " id="top-div" >
                

             <!-- RETRIEVING POST SPECIFIC CATEGORY ID WITH THE READ MORE BUTTON -->
<?php
    if(isset($_GET['author'])){
        $author_name = $_GET['author'];

        $query = "SELECT * FROM posts WHERE pst_author = '$author_name' ORDER BY pst_id DESC ";

        $query_result = mysqli_query($conn,$query);

        if(!$query_result){
            die("SELECTING POST QUERY PROBLEM" . mysqli_error($conn));
        }

        ?>
        <p><h6 class="cyan-text text-darken-4"><b>Posts Authored by <?php echo $author_name ?></b></h6></p>
        <?php
        while ($row = mysqli_fetch_assoc($query_result)) {
                       $id = $row['pst_id']; 
                       $tit =  $row['pst_title'];
                       $sub =  $row['pst_sub_title'];
                       $author =  $row['pst_author'];
                       $date =  $row['pst_date'];
                       $img =  $row['pst_img'];
                       $con =  substr($row['pst_content'], 0,150);
                       $tag =  $row['pst_tag'];

         ?>
         

                <span id="page-head"><b><a class="black-text" href="single.php?viewPost=<?php echo $id;?>"><?php echo $tit?></a></b></span>
                 <span class="grey-text" id="sub-text"><?php echo $sub?></span> 
                    <hr class="line">
                    <!-- <p><h5 class="light-blue-text text-accent-4"><?php echo $author ?></h5></p> -->

                    <p><h6>for <span class="light-blue-text text-accent-4" ><?php echo $tag?></span></h6></p>

                    <span >Posted on:  <?php echo $date?></span>
                    <hr class="line">

                    <div>
                        <img class="materialboxed" data-caption="<?php  echo $tit; ?>" src="imgs_upload/<?php echo $img?>" alt="html-image" id="img">
                    <hr class="line">



                    <p> <?php echo $con?>  </p> 


                       <a href="single.php?viewPost=<?php echo $id;?>" id="abc" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">library_books</i>
                        Read more</a>

                         <br><br><br>
                    </div>
                    

         <?php              

        }
    }




    $count = mysqli_num_rows($query_result);

    if ($count == 0) {
        echo "<h6 class='center-align '><img src='image/error.jpg' class='img-error img-responsive center-align' width='150px;'/><h5 class='center-align red-text'><b>OPPS<i>!</i> No Posts to Display<i>!!!</i></b></h6></h5>";
      
    }


?>
                

            </div>  

            <!-- END OF PREVIEWING POSTS FROM DATABASE -->




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
                        <p class="p-top">Admin Login</p>
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




                                           header("location:Admin");
                                   
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

                           


                        <form method="post">
                            <input type="text" name="username" id="search" placeholder="Username">
                            <input type="Password" name="pass" id="search" placeholder="Password">

                            <button  id="abc" name="login_btn" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">verified_user</i>Login</button> 
                        </form>
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
<!-- END OF BODY -->