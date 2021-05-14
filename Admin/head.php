<?php include "includes/headtag.php";?>
<?php ob_start();?>

    

<body>

<div class="navbar-fixed">
<nav class="white black-text">
    <div class="nav-wrapper">
        
    <a class=" right button-collapse show-on-large waves-effect" data-activates="sidenav"><i class="material-icons black-text hide-on-large-only">menu</i></a>
         

      <?php include "includes/topNav.php";?>   
<!--  <div class="chip right" style="margin-top: 20px;">
    <img src="image/avatar.png" alt="Contact Person">
    CMS Admin
  </div> -->
        </div>
    </div>
</nav>
</div>

<?php include "includes/sidenav.php";?>


<!-- DYNAMIC DIVISION -->
<div class="mainContainer">
<div id="main">
<div class="center-align">	



</div>
</div>
</div>
<!-- END OF DYNAMIC DIVISION  -->

</ul>



</body>
</html>



<script>

$(document).ready(function(){
   $('.button-collapse').sideNav();
    
    $('.parallax').parallax();
    $('.slider').slider();
    $('.modal').modal();
//    $(".carousel").carousel();
    $(".carousel").carousel({fullWidth:true}); 



//      $('.dropdown-button').dropdown({
//      inDuration: 600,
//     outDuration: 430,
//     hover:true,
//     constrainWidth: false, // Does not change width of dropdown to that of the activator
//     gutter: 2, // Spacing from edge
//     belowOrigin: true, // Displays dropdown below the button
//     alignment: 'left', // Displays dropdown with edge aligned to the left of button
//     stopPropagation: false // Stops event propagation
//     unclose:null,
//   }
// );
     
});


</script>