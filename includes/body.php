<?php include "includes/conn.php";?>

<div id="top_background">
 </div> 
 
    <div class="container" id="main-div"  >
        <div class="row">
            <div class="col l8 s12 m12 " >

    
                <?php

                // PART OF PAGINATION  
                       


                       if(isset($_GET['page'])){
                            $page = $_GET['page'];
                       }else{
                            $page = "";
                        }    

                        if($page == "" || $page == 1){
                            $page1 = 0;
                          }else{
                            $page1 = ($page * 5) - 5;
                          }  
                       


                        $query_post = "SELECT * FROM posts WHERE pst_status = 'published' ";

                        $exec_post = mysqli_query($conn,$query_post);

                        $counting = mysqli_num_rows($exec_post);

                        $counting = ceil($counting/5);


                        if($counting == 0 ){

                    if(isset($_SESSION['role']) && ($_SESSION['role']) == "Admin"){

                         $query = "SELECT * FROM posts ORDER BY pst_id DESC LIMIT $page1,5";
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

                    ?>



                <!-- END OF PART OF PAGINATION -->



              <!-- PREVIEWING POSTS FROM DATABASE -->
              <?php
                    $query = "SELECT * FROM posts WHERE pst_status = 'published' ORDER BY pst_id DESC LIMIT $page1,5";
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

                 

               ?>
                <br>
                

            </div>  

            <!-- END OF PREVIEWING POSTS FROM DATABASE -->

            



             <!-- SIDE BAR INCLUDES -->

             <div>
            

            <?php
                include "includes/sidebar.php";
            ?>

          
        
             </div>

        <!-- END OF SIDE BAR INCLUDES -->

    </div>


<!-- Pagination -->

        
        <?php

            if($counting !== 0){
             ?>   

                 <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                
                  <?php

                    for ($i=1; $i <= $counting; $i++) {  


                        if($i == $page){
                            echo "<li class='waves-effect active'><a href='home.php?page={$i}'>$i</a></li>";
                        }else{
                            echo "<li class='waves-effect'><a href='home.php?page={$i}'>$i</a></li>";
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
<!-- END OF BODY -->














<style>
    

    
</style>
















