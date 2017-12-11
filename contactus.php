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
  <?php if(isset($_SESSION['user'])) {?>
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
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
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
  <?php } else {?>
    <nav class="navbar navbar-custom navbar-fixed-top">
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
  <?php } ?>

    <div class="row text-center">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <br><br><br>
        <div class="jumbotron text-center">
          <h2>We want to hear from you!</h2>
          <h4>Fill out the form below with questions, comments, concerns and<br> we will get back to you soon!</h4><br>
          <form action="mailto:m190354@usna.edu" enctype="text/plain">
            <div class="form-group">
              <input type="text" name="name" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" placeholder="Name">
              <br><input type="email" name="email" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" placeholder="Email">
              <br><textarea class="form-control" name="feedback" style="max-width:50%;margin-left:auto;margin-right:auto;" rows="4"placeholder="Questions, Comments, Concerns"></textarea>
              <br><button type="submit" class="btn btn-default">Submit Feedback</button>
            </div>
          </form>
      </div>
      </div>
    </div>
</body>
</html>
