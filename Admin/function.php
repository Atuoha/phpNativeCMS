



<?php 
	function users_online(){
		if(isset($_GET['onlineUsers'])){
			global $conn;
				if(!$conn){
					session_start();
					include "includes/conn.php";


					$session = session_id();
			        $time = time();
			        $time_out_in_sec = 05;
			        $time_out = $time - $time_out_in_sec;

			        $query_sess = "SELECT * FROM users_online WHERE session = '$session' ";
			        $exec_sess = mysqli_query($conn,$query_sess);
			        $count = mysqli_num_rows($exec_sess);

				        if($count == NULL){
				            mysqli_query($conn,"INSERT INTO users_online(session,time) VALUES('$session','$time')");
				        }else{
				            mysqli_query($conn,"UPDATE users_online SET time = '$time'  WHERE session = '$session' ");
				        }

			        $users_online_query = "SELECT * FROM users_online WHERE time > '$time_out' ";
			        $exec_users_online_query = mysqli_query($conn,$users_online_query);

			        echo $usersOnline_count = mysqli_num_rows($exec_users_online_query);


			}
		}

		

	}
	users_online();



	// Function for preventing SQLI INJECTION, use it anywhere you have something going inside in the database

	function escape($string){
		global $conn;

		return mysqli_real_escape_string($conn,trim($string));
	}


	function returnCount($table){
		global $conn;
		

		$query_sel ="SELECT * FROM " . $table;

		$confirm_query = mysqli_query($conn,$query_sel);

		if(!$confirm_query){
			die("Error with query " . mysqli_error($conn));
		}

		$num_counts = mysqli_num_rows($confirm_query);

		return $num_counts;
	}
	// returnCount($table);



	function checkStatus($table,$column,$status){
		global $conn;

		$query_check = mysqli_query($conn,("SELECT * FROM $table WHERE $column = '$status'"));

		if(!$query_check){
			die("Error with checking status query in function " . mysqli_error($conn));
		}	

		return mysqli_num_rows($query_check);

	}


	function is_admin($username = ""){
		global $conn;

		$sel_users = mysqli_query($conn,"SELECT Role FROM users WHERE username = '$username'");

		if(!$sel_users){
			die("Error with Users select in function is_admin " . mysqli_error($conn));
		}

		$row_users = mysqli_fetch_array($sel_users);


		if($row_users['Role'] == "Admin"){
			return true;
		}else{
			return false;
		}
	}



	function user_exists($username){

		global $conn;

		$sel_users_query = mysqli_query($conn,"SELECT username FROM users WHERE username = '$username'");

		if(!$sel_users_query){
			die("Error with Users select in function is_admin " . mysqli_error($conn));
		}

		if(mysqli_num_rows($sel_users_query) > 0){
			return true;
		}else{
			return false;
		}
	}


	function mail_exists($mail){

		global $conn;

		$sel_mail_query = mysqli_query($conn,"SELECT email FROM users WHERE email = '$mail'");

		if(!$sel_mail_query){
			die("Error with Users select in function is_admin " . mysqli_error($conn));
		}

		if(mysqli_num_rows($sel_mail_query) > 0){
			return true;
		}else{
			return false;
		}
	}


	function register_user(){
		global $conn;

  				if(isset($_POST['btn-reg'])){
  					$username = mysqli_real_escape_string($conn,$_POST['user']);
  					$mail = mysqli_real_escape_string($conn,$_POST['mail']);
  					$pass = mysqli_real_escape_string($conn,$_POST['pass']);
  					// $repass = $_POST['repass'];
  					$fname =  mysqli_real_escape_string($conn,$_POST['fname']);
  					$lname = mysqli_real_escape_string($conn,$_POST['lname']);
  					$img = $_FILES['user_img']['name'];
  					$img_temp = $_FILES['user_img']['tmp_name'];

  					move_uploaded_file($img_temp, "admin/user_imgs/$img");




  					$min = 8;

  					//HASH ALOGRITHM FOR ENCRYPTING PASSWORD
  					// $hash = "$2y$10$";
			    //     $salt = "iusesomecrazystrings22";
			    //     $hash_salt = $hash . $salt;
			    //     $pass = crypt($pass, $hash_salt );
			    //     $repass = crypt($repass, $hash_salt );
			       // END OF HASH ALOGRITHM

            // $pass = password_hash($pass,PASSWORD_BCRYPT, array('cost' =>12));

            if(user_exists($username)){

                if(mail_exists($mail)){

               echo "<p class='center-align grey lighten-3 red-text' style='padding:5px'><i><b>OOPS!</b></i> User already exists</p>";   
            }

          }else{
                  if($username && $mail && $pass && $fname && $lname && $img){
              if(strlen($pass) < $min){
                echo "<img src='image/index.png' class='img-responsive center-align' width='30px;'/><p class='center-align grey lighten-3 red-text' style='padding:5px;'><i><b>OOPS!</b></i><b> Make sure your password is up to eight</b></p>";
              }else{
                if(strlen($pass) >= $min){
                $query_insert = "INSERT INTO users(username,email,password,firstname,lastname,user_img) VALUES('$username', '$mail', '$pass','$fname', '$lname', '$img')";

                $insert_query = mysqli_query($conn,$query_insert);

                if(!$insert_query){
                  die("QUERY PROBLEM WITH INSERTING" . mysqli_error($conn));
                }


                  echo "<img src='image/seen.png' class='img-responsive center-align' width='40px;'/><p class=' center-align grey lighten-3 green-text' style='padding:5px'><b>Account created succesfully</b></p>";
              }else{
                echo "<p class='center-align red-text'><i><b>OOPS!</b></i><b> Enter the same password on same inputs and make sure the passwords is up to eight characters |</b></p>";
              }

              }

              
            }else{
              echo "<p class='red-text'><i><b>OOPS!!</b></i> Please fill respective fields</p>";  
            }
            }

  					}		
		
	}



	function login_user(){
		global $conn;

		if(isset($_POST['login_btn'])){
                     $user = mysqli_real_escape_string($conn,$_POST['username']);
                     $password =  mysqli_real_escape_string($conn,$_POST['pass']);

                   	 // $user = mysqli_real_escape_string($conn,$user);
                     //  $password = mysqli_real_escape_string($conn,$password);


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
               
                          // if($user == $username_db && $password == $userpass_db){

                            if($count == 0){
                                  echo "<p class='red-text'>No record found!!</p>";
                                }elseif($user == $username_db && $password == $userpass_db){
                              	
                             //  $_SESSION['username'] = $username_db;
                             //  $_SESSION['pass'] = $userpass_db;
                             //  $_SESSION['role'] = $role_db;
                             //  $_SESSION['firstname'] = $firstname_db;
                             //  $_SESSION['lastname'] = $lastname_db;
                             //  $_SESSION['user_img'] = $img_db;
                             //  $_SESSION['user_status'] = $status_db;
                             //  $_SESSION['user_mail'] = $mail;
                             //  $_SESSION['user_id'] = $user_id;

                              
                             // header("location:Admin");

                                	echo "granted" ."<br>";
                                	echo $userpass_db . "<br>";
                                	echo $password;
	
                           }else{

                              echo "<i class='red-text'>Error with login details</i>";

                                           
                                // header("location:#test-swipe-1"); 
                                
                           }
                       }
                       else{
                         	echo "<p class='red-text'><i><b>OOPS<i>!!</i></b></i> Enter Login details please</b></p>";
                            }
                                   

                     }
	}



	function ifitismethod($method=null){

		if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

		return true;
	}else{
		return false;
	}

}

?>


