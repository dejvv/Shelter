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
                <li class="nav-item"><a href="../../../shelter/public/walk" class="nav-link"><i class="fa fa-paw"></i> Walk a dog</a></li>

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

    <div class="w3-content" style="max-width:1100px; margin-top: 5em;">
      <?php if(isset($dog["schedule"])): ?>
        <h2 id="nosch" class="heading-h3">
          There is no walk schedule for this dog, yet.
        </h2>
        <p class="heading-h3">Ok  you will be walking 
          <a href="<?= './walk' . "?id=" . $dog["dog_id"] ?>"><strong><?= $dog["name"] ?></strong></a>, great!</p>
        <?php $dogg=$dog["dog_id"] ?>
      <?php else: ?>
        <h2 class="heading-h3">
          This is walk schedule for <a href="<?= './walk' . "?id=" . $dog[0]["dog_id"] ?>"><strong><?= $dog[0]["name"] ?></strong></a>
        </h2>
        <div class="form" style="max-width: 50em; margin-top: 0; margin-bottom: 1em;">
          <table class="table table-bordered table-hover" id = "scheduled_dogs">
            <tr>
              <th>From</th>
              <th>To</th>
            </tr>
            <?php foreach ($dog as $data): ?>
            <tr>
              <td><?= $data["from_when"] ?></td>
              <td><?= $data["to_when"] ?></td>
            </tr>
            <?php endforeach; ?>
          </table>
        </div>
        <?php $dogg=$data["dog_id"] ?>
      <?php endif; ?>
      <form style="margin-top: 0;" id="schedule-form" class="form" action = "<?= "walk/setWalk" ?>" method = "post" content="">
        <div class="schedule-dog">
          <label for="date">Choose your date of walking:</label>
          <input type="date" id="party" name="date" min="<?= date("Y-m-d") ?>" max="2018-08-30">
          <label for="from-time">From time (9:00 - 18:00): </label>
          <input class="appt-time" type="time" name="from-time"
                 min="09:00" max="18:00">

          <label for="to-time">To time (10:00 - 19:00): </label>
          <input class="appt-time" type="time" name="to-time"
                 min="10:00" max="19:00">
          <input type="text" hidden value="<?= $dogg ?>" name="dogg">
          <button type="submit">Set schedule</button>
        </div>
        <?php if(isset($_GET["errors"])): ?>
          <span style="color: red;">all fields should be correctly filled</span>
        <?php endif; ?>

      </form>
      <div class="clearfix"></div>
  </div>

    <!-- Footer -->
    <footer class="w3-center navbar-dark bg-dark w3-padding-32" id="footer">
       <p>All rights reserved.</p>
    </footer>

  </body>
</html>

