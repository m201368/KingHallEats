<html>
<!--
 +Description: PHP file that welcomes user to King Hall Eats website. Provides links to every page availabe on the website, including login page.
 +Created by : Sarah Barkley
 +Created on : 23 OCT 2017
 +Last Edited: 06 NOV 2017
 +-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>KHE: Home</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
      <a class="navbar-brand" href="#">
        <span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span>
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="./food_request.php">Request Food</a></li>
        <li><a href="./contactus.php">Contact Us</a></li>
      </ul>
      <form class="navbar-form navbar-right" method="POST" action="profile.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" name="user">
          <input type="password" class="form-control" placeholder="Password" name="pass">
        </div>
        <button type="submit" class="btn btn-default">Log In</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./signup.php">New User</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <div class="row text-center">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h1>Welcome to King Hall Eats!</h1>
      <h4>King Hall Eats is a service provided by midshipman, for midshipman as a way to organize the delivery of food from the one and only King Hall up to your room.</h4>
    </div>
    <div class="col-md-2">
      Interested? Sign up <a href="./signup.php">today!</a>
    </div>
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <h4>Selection you want</h4>
      <img src="#" alt="sorry, you're slow" class="img-rounded">
    </div>
    <div class="col-md-4">
      <h4>At the price you want</h4>
      <img src="#" alt="sorry, you're slow" class="img-rounded">
    </div>
    <div class="col-md-4">
      <h4>Without ever leaving your room</h4>
      <img src="#" alt="sorry, you're slow" class="img-rounded">
    </div>
  </div>
</body>
</html>
