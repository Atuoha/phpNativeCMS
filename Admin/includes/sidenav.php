
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

<ul class="side-nav fixed navBar" id="sidenav" >
<li id="head-det">
    <div class="user-view">
        <a >
             <img  id="admin_image" src="user_imgs/<?php echo $user_img ?>" class="circle materialboxed" data-caption="<?php echo $username . " | " . $firstname . " " . $lastname . " | " ?>"  alt="some-image">
        </a>
            <span class="black-text center-align"><b>CMS ADMINISTRATOR</b></span>
    </div>
</li>



<li><a href="index.php" id="home"><i class="material-icons">apps</i><b>Dashboard</b></a></li>
<br class="hide-on-med-and-down">

<li><a id="pst" class="dropdown-button" data-activates="posts-li"><i class="material-icons">descriptions</i><i class="material-icons right T-btn">arrow_drop_down</i><b>Posts</b>
</a></li>

<ul class="dropdown-content" id="posts-li" >
<li><a  href="post.php" ><i class="material-icons">book</i><b>View all posts</b></a></li>
    <li><a href="add_post.php"><i class="material-icons">add_cirlce</i><b>Add post</b></a></li>
</ul>
<br class="hide-on-med-and-down">

<li><a href="cat.php" id="cat"><i class="material-icons">storage</i><b>Categories</b></a></li>
<br class="hide-on-med-and-down">

<li><a href="comment.php" id="comment"><i class="material-icons">insert_comment</i><b>Comments</b></a></li>
<br class="hide-on-med-and-down">

<li><a href="contact.php" id="comment"><i class="material-icons">contacts</i><b>Contacts</b></a></li>
<br class="hide-on-med-and-down">


<li><a  id="users" class="dropdown-button" data-activates="users-li"><i class="material-icons">people</i><i class="material-icons right T-btn ">arrow_drop_down</i><b>Users</b></a></li>

<ul class="dropdown-content" id="users-li" >
<li><a  href="users.php" ><i class="material-icons">assignment_ind</i><b>View all users</b></a></li>
<li><a href="add_user.php"><i class="material-icons">add_cirlce</i><b>Add user</b></a></li>
</ul>

<br class="hide-on-med-and-down">

<li><a href="profile.php" id="Profile"><i class="material-icons">person</i><b>Profile</b></a></li>
<br>




<li><a  class="dropdown-button waves-effect waves-light" data-activates="drop-list1" ><i class="material-icons">account_circle</i><i class="material-icons right T-btn" >arrow_drop_down</i><b>|   <?php  echo $username; ?>    |</b></a></li>



</ul>


 <ul id="drop-list1" class="dropdown-content">
    <li><a href="includes/logout.php" id="liveChat"><i class="material-icons">settings_power</i><b>Logout</b></a></li>
    <li><a href="../home.php" target="_blank"><i class="material-icons">extension</i><b>Visit website</b></a></li>


</ul>