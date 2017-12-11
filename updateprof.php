<!DOCTYPE html>
<html>
<!--
 +Description: PHP file that allows users to contact the staff for feedback.
 +Created by : Sarah Barkley
 +Created on : 18 NOV 2017
 +Last Edited: 19 NOV 2017
 +-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>KHE: Contact Us</title>
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
      <form class="navbar-form navbar-right" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q">
            <div class="input-group-btn">
              <button class="btn btn-default form-control" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="./food_request.php">Request Food</a></li>
        <li><a href="./feed.php">NewsFeed</a></li>
        <li><a href="./updateprof.php">Profile</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <br>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-2 jumbotron">
      <h3 class="text-center"><?php echo $_SESSION['username'];?></h3><br>
      <div style="max-width:75%;margin-left:auto;margin-right:auto;background-color:white;">
        <img src="IDONTKNOW" alt="Profile Picture">
      </div>
      <br>
      Name: <?php echo $data[$_SESSION['username']]['fullname'];?><br>
      Company: <?php echo $data[$_SESSION['username']]['company'];?><br>
      Room: <?php echo $data[$_SESSION['username']]['room'];?><br>
      Bio: <?php echo $data[$_SESSION['username']]['bio'];?><br>
    </div>
    <div class="col-md-9 text-center">
      <h3>Update Profile:</h3><br>
      <form action="#">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Full Name"  style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><input type="text" class="form-control" placeholder="Company"  style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><input type="text" class="form-control" placeholder="Room Number"  style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><input type="username" class="form-control" placeholder="Username"  style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><input type="password" class="form-control" placeholder="Password"  style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><button type="submit" class="btn btn-default">Update Profile</button>
        </div>
      </form>
    </div>
  </div>
</body>
