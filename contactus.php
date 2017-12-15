<!DOCTYPE html>
<!--
 +Description: PHP file that allows users to contact the staff for feedback.
 +Created by : Sarah Barkley
 +Created on : 18 NOV 2017
 +Last Modified by: Sarah Barkley
 +Last Modified on: 12 DEC 2017
 +Modified by: Ben Birney, Lani Davis, Chris Daves
 +-->

 <html>
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

    <?php

    function readUsers($fileName){
      $array;
      $fp = fopen($fileName, 'r');   //open the file for reading
      $line = fgets($fp);          // read lines
      while( !feof($fp) ) {
        $l = explode(",", $line);
        $array[$l[0]]['user'] = $l[0];
        $array[$l[0]]['pass'] = $l[1];
        $array[$l[0]]['name'] = $l[2];
        $array[$l[0]]['company'] = $l[3];
        $array[$l[0]]['room'] = $l[4];
        $array[$l[0]]['allergy'] = $l[5];
        $array[$l[0]]['status'] = $l[6];
        $array[$l[0]]['favfood'] = $l[7];
        $line = fgets($fp);
      }
      fclose($fp);                   //close the file
      return $array;
    }
    $array  = readUsers("users.txt");

    // Checks if the name field has been filled.
    // If it has, sends email to account m190354@usna.edu with feedback provided by the user.
      if(isset($_POST['name'])){
        $mailHeaders = "From: " . $_POST['email'] . "\r\n";
        mail("m190354@usna.edu",$_POST['name'],$_POST['feedback'],$mailHeaders);
        unset($_POST);
      }
    ?>

</head>
<body>

  <!-- If the user is logged in, provides a separate navigation bar.
    The navigation bar includes links to logout, profile, newsfeed, request food, and a search bar.-->
  <?php if(isset($_COOKIE['user'])) {?>
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

<!--
  This is a form requesting that users send feedback through a given format.
  The user's name, email, and feedback is asked from this form.
  If no name is given, an email will not be sent.
 -->
    <div class="row text-center">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <br><br><br>
        <div class="jumbotron text-center">
          <h2>We want to hear from you!</h2>
          <h4>Fill out the form below with questions, comments, concerns and<br> we will get back to you ASAP.</h4><br>
          <form action="?" method="post" id="daForm">
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

    <!--
      Team bios are provided below.
      These outline hobbies, majors, class, and intended service selection.
     -->
    <div class="row">
      <div class="col-md-3">
        <div class="jumbotron text-center">
        <h2>Lani Davis</h2>
        <h4>Team Lead</h4>
        <p style="font-size:12pt">
          I am currently a Youngster at the United States Naval Academy<br>
          I am a double major in Computer Science and Information Technology with a minor in Chinese<br>
          Hobbies: I love to travel, cook, and read. I am also on the USNA Fencing team.<br>
          I hope to service select Cryptologic Warfare.
        </p>
        <br>
      </div>
      </div>
      <div class="col-md-3">
        <div class="jumbotron text-center">
        <h2>Ben Birney</h2>
        <h4>Appearance Manager</h4>
        <p style="font-size:12pt">
          I am currently a Youngster at the United States Naval Academy<br>
          I am a double major in Computer Science and Information Technology.<br>
          Hobbies:I love to play chess. When I'm not playing chess or doing work, I also like to bike or look at pictures of my dog, Maisy.<br>
          I hope to service select submarines.
        </p>
      </div>
      </div>
      <div class="col-md-3">
        <div class="jumbotron text-center">
        <h2>Chris Daves</h2>
        <h4>Quality Control Manager</h4>
        <p style="font-size:12pt">
          I am currently a Youngster at the United States Naval Academy<br>
          I am a double major in Computer Science and Information Technology.<br>
          Hobbies: I am on the club soccer team, playing goalie.<br>
          I hope to service select either submarines or Cryptologic Warfare.
        </p>
        <br>
      </div>
      </div>
      <div class="col-md-3">
        <div class="jumbotron text-center">
        <h2>Sarah Barkley</h2>
        <h4>Interface Manager</h4>
        <p style="font-size:12pt">
          I am currently a Second Class at the United States Naval Academy<br>
          I am an Information Technology major.<br>
          Hobbies: I'm a classical and jazz violinist and music has been a part of my life as long as I can remember. If I'm not practicing, you'll find me reading or writing.<br>
          I hope to service select Marine Aviation.
        </p>
      </div>
    </div>
    </div>

</body>
</html>
