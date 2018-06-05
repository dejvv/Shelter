<?php
    // is user is not logged in, he shouldn't be able to visit this page
    if(!isset($_SESSION["user"])){
        header("Location: ../../../shelter/public/home");
    }
?>
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
                <li class="nav-item"><a href="../../../shelter/public/schedule" class="nav-link"><i class="fa fa-calendar"></i> My schedule</a></li>
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
            </ul>
        </div>
      </div>
    </nav>

    <div class="w3-content" style="max-width:1100px">
      <hr>
      <p>" "</p>

      <?php foreach ($dogs as $dog): ?>
        <div class="responsive">
          <div class="gallery">
            <a href="<?= 'walk' . "?id=" . $dog["id"] ?>">
              <img src="<?= $dog["picture"] ?>">
            </a>
            <div class="desc">
              <?= $dog["name"] ?>: <?= $dog["sex"] ?>, <?= $dog["age"] ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="clearfix"></div>
  </div>

    <!-- Footer -->
    <footer class="w3-center navbar-dark bg-dark w3-padding-32 fixed-bottom">
       <p>All rights reserved.</p>
    </footer>

  </body>
</html>

