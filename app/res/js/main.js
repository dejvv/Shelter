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
});