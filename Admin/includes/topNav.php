
<?php
    $cur_user = $_SESSION['user_id'];
    $query = "SELECT * FROM users WHERE user_id = '$cur_user' ";

    $exec_query = mysqli_query($conn,$query);

    if(!$exec_query){
        die("ERROR WITH PULLING DATA" .mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($exec_query)) {
        $username = $row['username'];
        $user_mail = $row['email'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $role = $row['Role'];
        $pass = $row['password'];
        $user_img = $row['user_img'];

    }


?>



<ul class="navbar-list right">


            <li class='black-text'><b>Admins Online</b></li>

            <li>
            <span class="black white-text users_online_span" id="top-user_count"></span></li>

            <li class="dropdown-button  waves-effect waves-light" data-activates="msg-drop" ><i class="material-icons" style="margin-right:40px;">email arrow_drop_down</i></li>

            <li><a href="profile.php" class="black-text"><span class="hide-on-med-and-down">CMS ADMIN </span><b>| <?php echo $username;?> |</b></a></li>

            <li><a href="" class="dropdown-button waves-effect waves-light" id="admin-img" data-activates="drop-list2" ><img src="user_imgs/<?php echo $user_img ?>"  class="circle" width=30px;" height="30px;"  alt="avatar"></a></li>

        </ul>
        

         <ul class="dropdown-content" id="drop-list2" >
              <li><a class="grey-text text-darken-1" href="profile.php"><i class="material-icons">person_outline</i> Profile</a></li>
              
               <li><a class="grey-text text-darken-1" href="post.php"><i class="material-icons">description</i> Posts</a></li>
              <li><a class="grey-text text-darken-1" href="includes/logout.php"><i class="material-icons">settings_power</i> Logout</a></li>
        </ul>



        <ul class="dropdown-content " id="msg-drop" >
              <div class="row">
                <div class="col l9" id="msg-con">
                    <ul class="responsive">
                      <li><a><b>Timothy Sams</b><br>
                       2019-07-12<br>
                       The purpose of writing this review is help people get ...
                     </a>
                      </li>

                    </ul>  
                    
                 </div>

                <div class="col l3 right">
                    <img src="image/links2.png" class="circle" width="50px;">
                 </div>
               </div> 



                <div class="row">
                <div class="col l9" id="msg-con">
                    <ul class="responsive">
                      <li><a><b>Emeka Chukwu</b><br>
                       2017-07-12<br>
                       Lines of floatings straight into the actions of our stripe...
                     </a>
                      </li>

                    </ul>  
                    
                 </div>

                <div class="col l3 right">
                    <img src="image/links.png" class="circle" width="50px;">
                 </div>
               </div> 



                <div class="row">
                <div class="col l9" id="msg-con">
                    <ul class="responsive">
                      <li><a><b>Sandra Adams</b><br>
                       2018-07-12<br>
                       We walked in chains but because of the nature of our...
                     </a>
                      </li>

                    </ul>  
                    
                 </div>

                <div class="col l3 right">
                    <img src="image/links3.jpg" class="circle" width="50px;">
                 </div>
               </div> 

        </ul>
