<!DOCTYPE html>

<?php

if (!isset($_COOKIE['user'])) {
  header("Location: signup.php");
  exit();
} else {
  $CSV = readUsers("users.txt");
  if ($CSV[$_COOKIE['user']]['status'] != 'admin') {
    header("Location: profile.php");
  }
}
?>

<html>
<!--
 +Description: PHP file that shows an admin stats of website
 +Created by : Chris Daves
 +Created on : 23 OCT 2017
 +Last Edited: 06 NOV 2017
 +-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Site Statistics</title>

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
  <br>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-2 jumbotron">
      <h3 class="text-center"><?php echo $_COOKIE['user'];?></h3><br>
      <div style="max-width:75%;margin-left:auto;margin-right:auto;background-color:white;">
        <img src="IDONTKNOW" alt="Profile Picture">
      </div>
      <br>
      Name: <?php echo $data[$_COOKIE['user']]['fullname'];?><br>
      Company: <?php echo $data[$_COOKIE['user']]['company'];?><br>
      Room: <?php echo $data[$_COOKIE['user']]['room'];?><br>
      Bio: <?php echo $data[$_COOKIE['user']]['bio'];?><br>
    </div>
    <div class="col-md-8">
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
      
        function readRequests($fileName){
          $array;
          $fp = fopen($fileName, 'r');   //open the file for reading
          $line = fgets($fp);          // read lines
          $count = 0;
          while( !feof($fp) ) {
            $l = explode(";", $line);
            $array[$count]['user'] = $l[0];
            $array[$count]['food'] = $l[1];
            $array[$count]['comment'] = $l[2];
            $array[$count]['time'] = $l[3];
            $array[$count]['stat'] = $l[4];
            $line = fgets($fp);
            $count++;
          }
          fclose($fp);                   //close the file
          return $array;
        }
        $users = readUsers("users.txt");
        $requests = readRequests("requests.txt");
        $deliveries = 0;
        foreach ($requests as $key) {
          if($requests[$key]['stat'] == "complete"){
            $deliveries++;
          }
        }
        echo "<table class=\"table table-bordered\" style=\"max-width:50%;margin-left:auto;margin-right:auto;\"><thead><td>Stat</td><td>Result</td></thead><tbody>";
        echo "<tr><td>Number of Users</td><td>".sizeof($users)."</td></tr>";
        echo "<tr><td>Total Requests Made</td><td>".sizeof($requests)."</td></tr>";
        echo "<tr><td>Requests filled</td><td>".$deliveries."</td></tr>";
        echo "</tbody></table>";
      ?>
    </div>
    <div class="col-md-2"></div>
  </div>
</body>
