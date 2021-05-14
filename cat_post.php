<?php include "includes/conn.php";?>
<?php include "includes/head.php"; ?>


    <div class="container" id="main-div"  >
        <div class="row">
            <div class="col l8 s12 m12 " >




              <!-- PREVIEWING POSTS FROM DATABASE -->
              <?php

                 if(isset($_GET['catPost'])){
                        $cat_id = $_GET['catPost'];




                        // PAGINATION

                             if(isset($_GET['cpage'])){
                            $page = $_GET['cpage'];
                            // $cat_id = $_GET['cat_idd'];
                       }else{
                            $page = "";
                        }    

                        if($page == "" || $page == 1){
                            $page1 = 0;
                          }else{
                            $page1 = ($page * 5) - 5;
                          }  
                       


                        $query_post = "SELECT * FROM posts WHERE pst_cat_id = '$cat_id' AND pst_status = 'published'";

                        $exec_page = mysqli_query($conn,$query_post);

                        $counting = mysqli_num_rows($exec_page);

                        $counting = ceil($counting/5);


                        // END OF PAGINATION

                 $query = "SELECT * FROM posts WHERE pst_cat_id = '$cat_id' AND pst_status = 'published' ORDER BY pst_id DESC LIMIT $page1,5";
                    $res_pos = mysqli_query($conn,$query);



                    while ($row = mysqli_fetch_assoc($res_pos)) {
                       $id = $row['pst_id']; 
                       $tit =  $row['pst_title'];
                       $sub =  $row['pst_sub_title'];
                       $author =  $row['pst_author'];
                       $date =  $row['pst_date'];
                       $img =  $row['pst_img'];
                       $con =  substr($row['pst_content'], 0,150);
                       $tag =  $row['pst_tag'];

                ?>

                <!-- POST TO BE DISPLACED  -->
                <?Php include "includes/post.php" ?>

                <!-- END OF POST TO BE DISPLACED -->

                <?Php } 
                 
                 $count = mysqli_num_rows($res_pos);

                 $count = ceil($count/5);

                 if($count == 0 ){

                    if(isset($_SESSION['role']) && ($_SESSION['role']) == "Admin"){

                       $query = "SELECT * FROM posts WHERE pst_cat_id = '$cat_id'  ORDER BY pst_id DESC ";
                    $res_pos = mysqli_query($conn,$query);



                    while ($row = mysqli_fetch_assoc($res_pos)) {
                       $id = $row['pst_id']; 
                       $tit =  $row['pst_title'];
                       $sub =  $row['pst_sub_title'];
                       $author =  $row['pst_author'];
                       $date =  $row['pst_date'];
                       $img =  $row['pst_img'];
                       $con =  substr($row['pst_content'], 0,150);
                       $tag =  $row['pst_tag'];

                ?>

                <!-- POST TO BE DISPLACED  -->
                <?Php include "includes/post.php" ?>

                <!-- END OF POST TO BE DISPLACED -->

                <?Php } 


                    }else{
                        echo "<h6 class='center-align '><img src='image/error.jpg' class='img-error img-responsive center-align' width='150px;'/><h5 class='center-align red-text'><b>OPPS<i>!!</i></b> No Posts to Display</h6></h5>";
                    }
                  
                 }

               }
               ?>
                <br>
                

            </div>  

            <!-- END OF PREVIEWING POSTS FROM DATABASE -->




    <!-- SIDE BAR INCLUDES -->

    <?php
        include "includes/sidebar.php";
    ?>                         


 <!-- END OF SIDE BAR INCLUDES -->
        
             </div>

       



<!-- Pagination -->
    
        <?php

          if($counting !== 0 ){

            ?>

             <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    
      <?php

        for ($i=1; $i <= $counting; $i++) {  

            if($i == $page){
                echo "<li class='waves-effect active'>
                <a href='cat_post.php?cpage={$i}$ catPost={$cat_id}'>$i</a>
                </li>";

            }else{
              echo "<li class='waves-effect'><a href='cat_post.php?cpage={$i} $ catPost={$cat_id}'>$i</a></li>";

            }

        }

      ?>  

    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>


         <?php   
          }


        ?>

        
     

<!-- End of Pagination -->

    </div>

</div>     
<!-- END OF BODY -->



























<!-- 
<?php
 if(isset($_GET['catPost'])){
                        $cat_id = $_GET['catPost'];

                        if(is_admin($_SESSION['username']))
                    {
                        $stmt1 = mysqli_prepare($conn,"SELECT pst_id,pst_title,pst_sub_title,pst_tag,pst_date,pst_img,pst_con,pst_author FROM posts WHERE post_category_id = ?");
                    }
                   else
                   {
                        $stmt2 = mysqli_prepare($conn,"SELECT st_id,pst_title,pst_sub_title,pst_tag,pst_date,pst_img,pst_con,pst_author FROM posts WHERE post_category_id = ? AND post_status = ?");

                        $published = 'published';

                   }
                if(isset($stmt1)){                                                           
                  mysqli_stmt_bind_param($stmt1,"i", $cat_id);
                  mysqli_stmt_execute($stmt1);
                  mysqli_stmt_bind_result($stmt1,$pst_id,$pst_title,$pst_sub_title,$pst_tag,$pst_date,$pst_img,$pst_con,$pst_author); 

                  $stmt = $stmt1;
                }else{
                   mysqli_stmt_bind_param($stmt2,"is", $cat_id, $published);
                  mysqli_stmt_execute($stmt2);
                  mysqli_stmt_bind_result($stmt2,$pst_id,$pst_title,$pst_sub_title,$pst_tag,$pst_date,$pst_img,$pst_con,$pst_author); 

                  $stmt = $stmt2;

                }
                


                if(mysqli_stmt_num_rows($stmt) < 1)
                {
                    echo "<h2 class='text-center text-danger'>No posts</h2>";
                }
                else
                {
                    while(mysqli_fetch($stmt)){

                     ?> 

                           <span id="page-head"><b><a class="black-text" href="single.php?viewPost=<?php echo $pst_id;?>"><?php echo $pst_title;?></a></b></span>
                 <span class="grey-text" id="sub-text"><?php echo $pst_sub_title;?></span> 
                    <hr class="line">
                    <p><h5 class="light-blue-text text-accent-4">By 
                    <a href="authorPost.php?author=<?php echo $pst_author ?> & p_id=<?php echo $pst_id ?>"> <?php echo $pst_author;?></a></h5></p>
                    <p><h6>for <span class="light-blue-text text-accent-4" ><?php echo $pst_tag?></span></h6></p>

                    <span >Posted on:  <?php echo date('d-m-Y  || h:i:a', strtotime ($pst_date));?></span>
                    <hr class="line">

                    <div>
                        <img class="materialboxed" data-caption="<?php  echo $pst_title; ?>" src="imgs_upload/<?php echo $pst_img;?>" alt="html-image" id="img">
                    <hr class="line">

                    <p class="text-justify">    <?php echo $pst_con?>

                    </p> 
                    <br>

                    <a href="single.php?viewPost=<?php echo $pst_id;?>" id="abc" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">library_books</i>
                        Read more</a>

                    </div> 

                    <br><br><br> <br> 

                    <?php
                    }

               }

             } 