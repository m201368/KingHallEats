<?php

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
    $array[$count]['doneBy'] = $l[5];
    $line = fgets($fp);
    $count++;
  }
  fclose($fp);                   //close the file
  return $array;
}

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Search Page</title>

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
  </head>
  <body>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
<form class="navbar-form navbar-right" role="search" action="search.php">
  <div class="input-group">
      <input type="text" class="form-control" placeholder="Search" name="q">
      <div class="input-group-btn">
        <button class="btn btn-default form-control" type="submit"><i class="glyphicon glyphicon-search"></i></button>
      </div>
  </div>
</form>
<ul class="nav navbar-nav navbar-right">
  <?php
   if ($array[$_COOKIE['user']]['accesslevel'] == 'admin') { ?>
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
        <br>
        Name: <?php echo $array[$_COOKIE['user']]["name"];?><br>
        Company: <?php echo $array[$_COOKIE['user']]["company"];?><br>
        Room: <?php echo $array[$_COOKIE['user']]["room"];?><br>
        Allergies: <?php echo $array[$_COOKIE['user']]["allergy"];?><br>
        Favorite Food: <?php echo $array[$_COOKIE['user']]["favfood"];?><br>
      </div>
      <div class="col-md-8">
        <div class="input-group"style="max-width:25%;">
          <input type="text" class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Search</button>
          </span>
        </div>

    <h4>Current Requests:</h4>
    <table class="table table-bordered" style="max-width:50%;margin-left:auto;margin-right:auto;">
        <thead>
          <tr><th>Person Requesting</th><th>Food Requested</th><th>Comments</th><th>Time</th><th>Status</th></tr>
        </thead>
        <tbody>

    <?php
  $requests = readRequests("requests.txt");
      // echo"<pre>";
      // print_r($requests);
      // print_r($_POST);
      // echo"</pre>";
        foreach ($requests as $key => $value) {

          if($_POST['search']==""){
          $requester=$requests[$key]["stat"];
          $tester="incomplete";

          if (strpos($requester, $tester)== 0) {

                echo "<tr><td>".$requests[$key]["user"]."</td><td>".$requests[$key]["food"]."</td><td>".$requests[$key]["comment"]."</td><td>".$requests[$key]["time"]."</td><td>".$requests[$key]["stat"]."</td></tr>";
        }
      }else{
        $requester=$requests[$key]["stat"];
        $tester="incomplete";
        $user=$requests[$key]["user"];
        $food=$requests[$key]["food"];
        $comment=$requests[$key]["comment"];
        $search=$_POST['search'];
        $user=strtolower($user);
        $food=strtolower($food);
        $comment=strtolower($comment);
        $search=strtolower($search);

        // echo $user."   user  \n";
        // echo $search."   search  \n";
        if (strpos($requester, $tester)== 0 && (strpos($user,$search)!==FALSE || strpos($food,$search)!==FALSE || strpos($comment,$search)!==FALSE )) {

              echo "<tr><td>".$requests[$key]["user"]."</td><td>".$requests[$key]["food"]."</td><td>".$requests[$key]["comment"]."</td><td>".$requests[$key]["time"]."</td><td>".$requests[$key]["stat"]."</td></tr>";
      }
      }
      }

    ?>
    </tbody>
    </table>
  </body>
