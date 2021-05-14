<?php include "includes/head.php";?>
<?php include "includes/conn.php"; ?>

<div>


    <div class="container" id="main-div"  >
        <div class="row">
            <div class="col l8 s12 m12 " >

              <?php

              	 if(isset($_POST['searchBtn'])){
			        $searched = $_POST['search'];

              if($searched){
                 
              $query = "SELECT * FROM posts WHERE pst_title LIKE '%$searched%' ";

              $query_res = mysqli_query($conn,$query);

              if(!$query_res){
                  die('QUERY PROBLEM' + mysql_error($conn));
              }

              $count = mysqli_num_rows($query_res);

              if($count == 0 ){
                  echo "<h6 class='center-align'><img id='error'  src='image/ss.PNG' class='img-responsive center-align'/><h5 class='center-align brown-text   ' style='border-radius:10px; padding:5px'><i><b>OPPS!!!</b></i> No Result related to your input<i>!</i></h6></h5>";
              }else{

                    while ($row = mysqli_fetch_assoc($query_res)) {
                      $id = $row['pst_id'];
                       $tit =  $row['pst_title'];
                       $sub =  $row['pst_sub_title'];
                       $author =  $row['pst_author'];
                       $date =  $row['pst_date'];
                       $img =  $row['pst_img'];
                       $con =  $row['pst_content'];
                       $tag =  $row['pst_tag'];

                ?>

                <!-- POST TO BE DISPLACED  -->
                 <span id="page-head"><b><a class="black-text" href="single.php?viewPost=<?php echo $id;?>"><?php echo $tit ?></a></b></span>
                 <span class="grey-text" id="sub-text"><?php echo $sub ?></span> 
                    <hr class="line">
                    <p><h5 class="light-blue-text text-accent-4">By 
<a href="authorPost.php?author=<?php echo $author ?> & p_id=<?php echo $id ?>"> <?php echo $author ?></a></h5></p>
                    <p><h6>for <span class="light-blue-text text-accent-4" ><?php echo $tag ?></span></h6></p>

                    <span >Posted on:  <?php echo date('d-m-Y  || h:i:a', strtotime ($date)) ?></span>
                    <hr class="line">

                    <div>
                        <img class="materialboxed" data-caption="<?php  echo $tit; ?>" src="imgs_upload/<?php echo $img ?>" alt="html-image" id="img">
                    <hr class="line">

                    <p class="text-justify">    <?php echo $con ?>

                    </p> 
                    <br>

                    <a href="single.php?viewPost=<?php echo $id;?>" id="abc" class=" light-blue accent-4 waves-effect white-text waves-light hoverable"><i class="material-icons right ">library_books</i>
                        Read more</a>

                    </div> 

                    <br><br><br> <br>

                <!-- END OF POST TO BE DISPLACED -->

                <?Php } 


               ?>
                <?php
              }

          }else{
             echo "<h6 class='center-align' ><img src='image/ss.PNG' id='error' class='img-responsive center-align' /><h5 class=' center-align brown-text ' style='padding:5px; border-radius:10px;'><i><b>OPPS!!!</b></i> There's no input to search for. Enter keyword<i>!</i></h6></h5>";
          } 
              }


			    ?>




                    

            </div>   

             <!-- SIDE BAR INCLUDES -->

             <div>
            
            <?php include "includes/sidebar.php" ?>   

             </div>

        <!-- END OF SIDE BAR INCLUDES -->

    </div>



</div>     
<!-- END OF BODY -->


</div>    


<div>
<?php include "includes/foot.php"; ?>
</div>  
  
</body>
</html>