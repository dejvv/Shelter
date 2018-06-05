<!DOCTYPE html>
<html>
  <head>
      <title>Shelter</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- font awesome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
  
  <body>

    <!-- Navbar (sit on top) -->
    <!-- <div class="w3-top">
      <div class="w3-bar w3-white w3-padding w3-card" style="letter-spacing:4px;">
        <a href="#home" class="w3-bar-item w3-button">Gourmet au Catering</a> -->
        <!-- Right-sided navbar links. Hide them on small screens -->
        <!-- <div class="w3-right w3-hide-small">
          <a href="#about" class="w3-bar-item w3-button">About</a>
          <a href="#menu" class="w3-bar-item w3-button">Menu</a>
          <a href="#contact" class="w3-bar-item w3-button">Contact</a>
        </div>
      </div>
    </div> -->

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="my-nav">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="../../../shelter/app/res/images/paw.png" id = "paw-image"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <!-- <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../../shelter/public/logIn">Walk a dog</a>
            </li>
          </ul> -->
          <ul class="nav navbar-nav ml-auto">
                <?php if(isset($_SESSION["user"])): ?>
                <li class="nav-item"><a href="../../../shelter/public/walk" class="nav-link"><i class="fa fa-paw"></i> Walk a dog</a></li>
                <li class="nav-item"><a href="../../../shelter/public/schedule" class="nav-link"><i class="fa fa-calendar"></i>  My schedule</a></li>
                <li class="dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <strong><?php
                            echo $_SESSION["user-name"];
                        ?>
                    </strong>
                  </a>


                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <!-- <p style="margin-bottom=0;"> -->
                              <a href="logIn/logOutUser/" class="btn btn-danger btn-block">Log out</a>
                          <!-- </p> -->
                  </div>
                </li>
                <?php else: ?>
                <li class="nav-item"><a href="../../../shelter/public/logIn" class="nav-link"><i class="fa fa-user"></i> Log in</a></li>
                <?php endif; ?>
            </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="w3-display-container w3-content w3-wide" style="max-width:1600px;" id="home">
      <img class="my-image" src="../../../shelter/app/res/images/dogges.jpg" id="dogs-image">
    </header>

    <!-- Page content -->
    <div class="w3-content" style="max-width:1100px">

      <!-- About Section -->
      <div class="w3-row w3-padding-64" id="about">

        <div class="w3-col m12 w3-padding-large">
          <h1 class="w3-center">What is "walk a dog"?</h1><br>
          <p class="w3-large">It is an application that let's you schedule a dog walking session with <span class="w3-tag w3-light-grey">shelters</span> in your local area.</p>
          <p class="w3-large w3-text-grey">
          Choose a dog, take him to a walk or just play with him.
          Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>
      
      <hr>

    <div id="join">
        <?php if(isset($_SESSION["user"])): ?>
        <a href="../../../shelter/public/walk" class="mya">Start walking a dog!</a>
        <?php else: ?>
        <a href="../../../shelter/public/logIn" class="mya">Start walking a dog!</a>
        <?php endif; ?>
    </div>

      
    <!-- End page content -->
    </div>

    <!-- Footer -->
    <footer class="w3-center navbar-dark bg-dark w3-padding-32">
       <p>All rights reserved.</p>
    </footer>

  </body>
</html>

