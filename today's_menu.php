<?php
  // Load in our csv library from previous lab
  require_once("lib_read_csv.php");

  // read in our schedules
  $data = read_csv("menu.csv");

  ?>
  <html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Today's Menu</title>

      <!-- Bootstrap -->
      <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="bootstrap/js/bootstrap.min.js"></script>
      <link type="text/css" rel="stylesheet" href="default.css">
    </head>
    <body>
      <nav class="navbar navbar-custom">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <a class="navbar-brand" href="./welcomePage.php">
            <span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span>
          </a>
          <ul class="nav navbar-nav">
            <li><a href="./contactus.php">Contact Us</a></li>
          </ul>
          <form class="navbar-form navbar-right" action="logout.php">
            <div class="input-group">
                <button class="form-control btn btn-default" type="submit"><i class="glyphicon glyphicon-log-out"></i></button>
            </div>
          </form>
          <form method="post" class="navbar-form navbar-right" role="search" action="search.php">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <div class="input-group-btn">
                  <button class="btn btn-default form-control" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <?php
             if ($array[$_COOKIE['user']]['status'] == 'admin') { ?>
               <li class="dropdown">
               <a class="dropdown-toggle" data-toggle="dropdown" href="">Admin
               <span class="caret"></span></a>
               <ul class="dropdown-menu">
                <li><a href="./manage_users.php">Manage Users</a></li>
                <li><a href="./stats.php">Statistics</a></li>
               </ul>
               </li>
            <?php  } ?>
            <li><a href="./food_request.php">Request Food</a></li>
            <li><a href="./feed.php">NewsFeed</a></li>
            <li><a href="./profile.php">Profile</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <h3 class="text-center">Today's Menu</h3>
        <?php
          echo "Breakfast: ".$data['breakfast']."<br>";
          echo "Lunch: ".$data['lunch']."<br>";
          echo "Dinner: ".$data['dinner']."<br>";
        ?>
        </div>
        <div class="col-md-4"></div>
      </div>
    </body>
  </html>
