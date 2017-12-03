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
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <a class="navbar-brand" href="./welcomePage.php">
        <span class="glyphicon glyphicon-ice-lolly-tasted" aria-hidden="true"></span>
      </a>
      <ul class="nav navbar-nav">
        <li><a href="./contactus.php">Contact Us</a></li>
      </ul>
      <form class="navbar-form navbar-right" method="POST" action="profile.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" name="user">
          <input type="password" class="form-control" placeholder="Password" name="pass">
        </div>
        <button type="submit" class="btn btn-default">Log In</button>
      </form>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <br>
  <div class="row text-center">
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <div class="jumbotron">
        <h2 class="text-center">What we're about</h4><br>
        King Hall Eats is a service provided by midshipman, for midshipman as a way to organize the delivery of food from the one and only King Hall up to your room.
        <br><br>***We should probably make this longer***<br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
    </div>
    <div class="col-md-4">
      <div class="jumbotron text-center">
        <h2 class="text-center">Sign Up</h4>
        <form action="" id="form" method="POST" onsubmit="check()">
          <input type="text" class="form-control" name="names" style="max-width:50%;margin-left:auto;margin-right:auto;" placeholder="Name"><br>
          <input type="text" class="form-control" name="company" style="max-width:50%;margin-left:auto;margin-right:auto;" placeholder="Company"><br>
          <input type="text" class="form-control" name="room" style="max-width:50%;margin-left:auto;margin-right:auto;" placeholder="Room #"><br>
          <input type="text" class="form-control" name="user" style="max-width:50%;margin-left:auto;margin-right:auto;" placeholder="Username"><br>
          <input type="password" class="form-control" name="pass" style="max-width:50%;margin-left:auto;margin-right:auto;" placeholder="Password"><br>
          <button type="submit" class="btn btn-default">Sign Up</button>
        </form>
       <br>
     </div>
    </div>
    <div class="col-md-2"></div>
  </div>
</body>
</html>
