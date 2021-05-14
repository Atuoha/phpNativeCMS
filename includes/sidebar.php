<?php include "includes/conn.php";?>
<?php ob_start(); ?>

<div class="col l4 s12 m12">

                        <!-- BLOG SEARCH -->
                    <div class="grey lighten-4  z-depth-1" id="log-div">
                        <p class="p-top">Search</p>
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
                     $user = mysqli_real_escape_string($conn, trim($_POST['username']));
                     $password = mysqli_real_escape_string($conn, trim($_POST['pass']));


                        if($user && $password){

                        $check_username_query = "SELECT * FROM users WHERE username = '{$user}'  ";

                        // AND user_status = 'Authorized'
                                         
                        $exec_check_username = mysqli_query($conn,$check_username_query);

                        if(! $exec_check_username){
                          die("Error with Login -username side (DATABASE!!)" . mysqli_error($conn));
                          }

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
                                
                                $count = mysqli_num_rows($exec_check_username);

                                if($count == 0){
                                  echo "<p class='red-text'>No record found!!</p>";
                                }elseif($user == $username_db && $password == $userpass_db){
               
                          // if($user == $username_db && $password == $userpass_db){

                                                       

                              $_SESSION['username'] = $username_db;
                              $_SESSION['pass'] = $userpass_db;
                              $_SESSION['role'] = $role_db;
                              $_SESSION['firstname'] = $firstname_db;
                              $_SESSION['lastname'] = $lastname_db;
                              $_SESSION['user_img'] = $img_db;
                              $_SESSION['user_status'] = $status_db;
                              $_SESSION['user_mail'] = $mail;
                              $_SESSION['user_id'] = $user_id;

                              ?>

                             <script> location.replace("../CMS/Admin"); </script>
                              
                            <?php
                           }else{

                              echo "<i class='red-text'><b>OOPS!!</b>Error with login details</i>";
                                
                                
                           }
                       }
                       else{
                            echo "<p class='red-text'><i><b>OOPS<i>!!</i></b></i> Enter Login details please</b></p>";
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

                            <button  id="abc" name="login_btn" class="light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">verified_user</i>Login</button>

                            <br><a href="/CMS/forgot.php?forgot=<?php echo uniqid(true) ?>"><b>Forgot password?</b></a> 
                        </form>
                       <?php   
                        }

                      ?>



                        <!-- LOGIN DETAILS WHEN LOGGED IN -->



                    </div>
    

                    <div class="grey lighten-4 z-depth-1" id="log-divs">
                        <p class="p-top center-align">Blog Categories</p>

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
                        <li><a href="/CMS/cat_post/<?php echo $cat_id;?>"><?php echo $content; ?></a>
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