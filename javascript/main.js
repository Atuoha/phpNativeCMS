$(document).ready(function(){
   $('.button-collapse').sideNav();
    
    $('.parallax').parallax();
    $('.slider').slider();
    $('.modal').modal();
//    $(".carousel").carousel();
    $(".carousel").carousel({fullWidth:true}); 



     $('.dropdown-button').dropdown({
    hover:true,
    constrainWidth: false, // Does not change width of dropdown to that of the activator
    gutter: 2, // Spacing from edge
    belowOrigin: true, // Displays dropdown below the button
    alignment: 'left', // Displays dropdown with edge aligned to the left of button
    stopPropagation: false // Stops event propagation
  }
);
     





// PRELOADER

// var divbox = "<div id='load-screen'><div id='loading'></div></div>";


// $("body").prepend(divbox);

// $('#load-screen').delay(800).fadeOut(600, function(){
//   $(this).remove();
// })



// PRELOADER





});