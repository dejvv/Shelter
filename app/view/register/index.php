<?php
    // is user is logged in, he shouldn't be able to visit register page anymore
    if(isset($_SESSION["user"])){
        header("Location: ../../../DiaGenKri/public/home");
    }
?>
<!DOCTYPE html>
<html>
  <head>
      <title>Shelter</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- jquery, popper.js and bootstrap -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

      <!-- my additional javascript and stylesheets -->
      <link rel="stylesheet" href="../../../shelter/app/res/css/main.css">
      <script type="text/javascript" src="../../../shelter/app/res/js/main.js" defer></script>

      <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body style="background: #ccc;">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="my-nav">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="../../../shelter/app/res/images/paw.png" id = "paw-image"></a>
        <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../../shelter/public/logIn">Walk a dog</a>
            </li>
          </ul>
        </div> -->
      </div>
    </nav>
    <div class="form">
      <div class="thumbnail"><img src="../../../shelter/app/res/images/paw.png"/></div>
      <form class="register-form" id="form-rg" action = "<?= "register/add/" ?>" method = "post" content="">
        <input type="text" placeholder="name" name="name"/>
        <input type="text" placeholder="surname" name="surname"/>
        <input type="password" placeholder="password" name="password"/>
        <input type="text" placeholder="email address" name="email"/>
        <button type="submit">create</button>
        <p class="message">Already registered? <a href="../../../shelter/public/logIn" id="form-rg-toggle">Sign In</a></p>
      </form>
    </div>
  </body>
</html>