$( document ).ready(function() {
  // $("#form-lg-toggle").click(function() {
  //   //$("#forma").animate({ height: "toggle", opacity: "toggle" }, "slow");
  //     console.log("clicked hide login, show register");
  //     $("#form-lg").hide(700);
  //     $("#form-rg").show(700);
  // });

  // $("#form-rg-toggle").click(function() {
  //   //$("#forma").animate({ height: "toggle", opacity: "toggle" }, "slow");
  //     console.log("clicked hide register, show login");
  //     $("#form-rg").hide(700);
  //     $("#form-lg").show(700);
  // });

    // scrolling
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("my-nav").style.top = "0";
      } else {
        document.getElementById("my-nav").style.top = "-4.5em";
      }
      prevScrollpos = currentScrollPos;
    }

    // delete schedule with ajax
    // Delete 
   $('.fa-times').click(function(){
    var el = this;
    var id = this.id;
    console.log("[delete schedule]", id);

   
    // AJAX Request
    $.ajax({
     url: 'schedule',
     type: 'POST',
     data: { id_schedule:id },
     success: function(response){

      // Removing row from HTML Table
      $(el).closest('tr').css('background','tomato');
      $(el).closest('tr').fadeOut(800, function(){ 
       $(this).remove();
      });

     }
    });

   });
});