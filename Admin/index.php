<?php
	include "head.php";
  include "includes/conn.php";?>

<div  class="mainContainer">
	
<div class="center-align">

<div class="Bigcontainer">



      <div class="row">
        <div class="col s12 m3 z-depth-1">
          <div class="card cyan darken-3 cards ">
            <div class="card-content white-text">
              <div class="row">
              	<div class="col l4 s12 m12">
              		<i class="material-icons large">description</i>
              	</div>

              	<div class="col l8 s12 m12">
              		<h5><b><?php echo $post_count = returnCount('posts') ;?> </b></h5>
              		<h6><b>Post(s)</b></h6>
              
              </div>
            </div>
             <hr class="line">
            <span><i class="clicked material-icons right">more</i><a href="post.php" class="white-text" style="text-transform: capitalize;" ><b>View Post(s)</b></a></span>
              	</div>
          </div>
        </div>


        <div class="col s12 m3 cards z-depth-1">
          <div class="card cyan darken-4">
            <div class="card-content white-text">
              <div class="row">
              	<div class="col l4 s12 m12">
              		<i class="material-icons large">question_answer</i>
              	</div>

              	<div class="col l8 s12 m12">

              		<h5><b><?php echo $count_comments = returnCount('comment') ; ?></b></h5>
              		<h6><b>Comment(s)</b></h6>
              	</div>
              		
              </div>
              <hr class="line">
            <span><i class="clicked material-icons right">more</i><a href="comment.php" class="white-text" style="text-transform: capitalize;" ><b>View Comment(s)</b></a></span>
            </div>
            
          </div>
        </div>


	<div class="col s12 m3 cardss z-depth-1">
          <div class="card cyan darken-3">
            <div class="card-content white-text">
             <div class="row">

              	<div class="col l4 s12 m12">
              		<i class="material-icons large">perm_contact_calendar</i>
              	</div>

              	<div class="col l8 s12 m12">
              		<h5><b><?php echo $count_users = returnCount('users') ?></b></h5>
              		<h6><b>User(s)</b></h6>
              	</div>
              		
              </div>
               <hr class="line">
            <span><i class="clicked material-icons right">more</i><a href="users.php" class="white-text" style="text-transform: capitalize;"><b>View User(s)</b></a></span>
            </div>
          
          </div>
        </div>
	

<div class="col s12 m3 cards z-depth-1">
          <div class="card cyan darken-4">
            <div class="card-content white-text">
              <div class="row">

                <div class="col l4 s12 m12">
                  <i class="material-icons large">storage</i>
                </div>

                <div class="col l8 s12 m12">
                  <h5><b><?php echo $count = returnCount('categories') ?></b></h5>
                  <h6><b>Categories</b></h6>
                </div>
                  
              </div>
               <hr class="line">
             <span ><i class=" clicked material-icons right">more</i><a href="cat.php" class="white-text" style="text-transform: capitalize;"><b>View Categories</b></a></span>
            </div>
          </div>
        </div>



      </div>
            


      <?php

        $query_draft_count = checkStatus('posts','pst_status','draft');

        $query_pub_count = checkStatus('posts','pst_status','published');

        $query_unpub_count = checkStatus('posts','pst_status','Unpublished');

         $app_cmt_count = checkStatus('comment','status','approved');

          $unapp_cmt_count = checkStatus('comment','status','unapproved');

         $count_admin = checkStatus('users','Role','Admin');
 
         $count_sub = checkStatus('users','Role','Subscriber');

      ?>


<div class="row">
  <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count',],

          <?php 
            $elem_text = ['All Posts','Draft Posts','Published', 'Unpublished', 'Comments', 'Approved','Unapproved','All Users', 'Admins', 'Subscribers','Categories'];
            $elem_data = [$post_count, $query_draft_count, $query_pub_count,  $query_unpub_count , $count_comments, $app_cmt_count, $unapp_cmt_count ,$count_users,$count_admin, $count_sub ,$count];

            for($i = 0; $i < 11; $i ++){
              echo "['{$elem_text[$i]}'" . "," .  "{$elem_data[$i]}],";
            }

          ?>

          // ['Post', <?php echo $post_count?>],
        ]);

        var options = {
          chart: {
            title: 'DATABASE ANALYSIS',
            subtitle: 'Posts, Comments, Users and Categories: 2019-Present',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<div class="container">
<div id="columnchart_material"  ></div>
</div>

</div>




</div>
</div>	
</div>




<script>
  
</script>