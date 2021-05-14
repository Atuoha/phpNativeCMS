$(document).ready(function(){
   $('.button-collapse').sideNav();
    $('.scrollspy').scrollSpy();
    $('.modal').modal({
      dismissible:true,
    });
    $('select').material_select();
//    $(".carousel").carousel();
    $(".carousel").carousel({fullWidth:true}); 

       $('.dropdown-button').dropdown({
    // hover:true,
    constrainWidth: false, // Does not change width of dropdown to that of the activator
    // gutter: 4, // Spacing from edge
    belowOrigin: true, // Displays dropdown below the button
    alignment: 'left', // Displays dropdown with edge aligned to the left of button
    // stopPropagation: false // Stops event propagation
  }
);

// $('.del-cat-btn').click(function(){
//     alert('Category removed succesfully');
// })


// $('.delpost').click(function(){
//     alert('Post removed succesfully');
// })

// $('.delpst').click(function(){
//     alert('Contact message deleted succesfully');
// })

// $('.delcom').click(function(){
//     alert('comment deleted succesfully');
// })


// $('.pst-btn').click(function(){
//     alert('Post Edited Successfully');
// })

// $('#abcd').click(function(){
//     alert("Comment Updated succesfully");
// })


// $('.pubpost').click(function(){
//     alert('Post published succesfully!')
// })

// $('.unpubpost').click(function(){
//     alert('Post unpublished succesfully!')
// })


$('.comment_cnt').click(function(){
  return confirm("Do you want view all comments for this post?");
})


$('#select_all').click(function(){
   
   if(this.checked){
      $('.checkboxes').each(function(){
          this.checked = true;
      })
   }else
       $('.checkboxes').each(function(){
          this.checked = false;
      })
})



$('.delpst').click(function(){
    return confirm('Do you want to delete?');
})


$('.delcom').click(function(){

  var com_id = $(this).attr("rel");

  var com_msg = $(this).attr("id");

  var delComUrl = "comment.php?delcom=" + com_id + " ";

  $('.modalCom').attr("href",delComUrl);

  $('.para').text(com_msg);

})

 






















$('.delcmt').click(function(){
   var id = $(this).attr("rel");
   var con_det = $(this).attr('id');

    var delUrl = "contact.php?delCon=" + id + " "

$('.modalDel').attr("href", delUrl);

$('.para').text(con_det);

})




$('.actionPerform').click(function(){
    return confirm('Do you want to perform operation?');
})




// PRELOADER

// var divbox = "<div id='load-screen'><div id='loading'></div></div>";


// $("body").prepend(divbox);

// $('#load-screen').delay(900).fadeOut(500, function(){
//   $(this).remove();
// })


// $('#reset-btn').click(function(){
//   alert("Post view reset was succesfully");
// })


// PRELOADER



$('.resetView').click(function(){
  return confirm('Do you want to Reset post view count to zero?');
})


$('.resetCmt').click(function(){
  return confirm('Do you want to Reset post comment count to zero?');
})



// RELOADING PAGE IN ORDER TO GET USERS WITHOUT REFRESHING

    function loadUsers(){
         $.get("function.php?onlineUsers=result", function(data){

      $(".users_online_span").text(data);

    });
    }
   

    setInterval(function(){
      loadUsers();
    },500);

// RELOADING PAGE IN ORDER TO GET USERS WITHOUT REFRESHING
















});