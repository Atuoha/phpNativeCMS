 <!-- LOGIN -->
<?php
        if(isset($_POST['login_btn'])){
             $user = $_POST['username'];
             $pass =  $_POST['pass'];

             $user = mysqli_escape_string($conn,$user);
             $pass = mysqli_escape_string($conn,$pass);

          if($user && $pass){

                                        

          }else{
          echo "<img src='image/index.png' class='img-responsive center-align' width='30px;'/><p class='red-text'  id='error_error'><i><b>OOPS<i>!!</i></b></i><b> Enter Login details please</b></p>";
               }
        }
?>                            

<!-- END OF LOGIN -->