<!--
 +Description: PHP file that allows users to filter feeds by company #.
 +Created by : Lani Davis
 +Created on : 27 NOV 2017
 +Last Modified by: Lani Davis
 +Last Modified on: 15 DEC 2017
 +Modified by: Sarah Barkley, Ben Birney, Chris Daves
 +-->

<?php

// function reads food requests submitted from given file $fileName
// returns an array of those requests
function readRequests($fileName)
{
    $request;
    $fp = fopen($fileName, 'r');   //open the file for reading
  $line = fgets($fp);          // read lines
  $count = 0;
    while (!feof($fp)) {
        $l = explode(";", $line);
        $request[$count]['user'] = $l[0];
        $request[$count]['food'] = $l[1];
        $request[$count]['comment'] = $l[2];
        $request[$count]['time'] = $l[3];
        $request[$count]['stat'] = $l[4];
        $line = fgets($fp);
        $count++;
    }
    fclose($fp);
    //close the file
    return $request;
}

// function: reads information from a given file containing all user data
// outputs that data in an associative array
function readUsers($fileName)
  {
    $array;
    $fp = fopen($fileName, 'r');   //open the file for reading
    $line = fgets($fp);          // read lines
    while (!feof($fp)) {
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

?>

<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Company feed</title>

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
  <script type="text/javascript">

  // function: class a php script found in deliverc.php to update the given requests
    function updateRequests(user,time){
      var line="deliverc.php?user="+user+"&time="+time;
      window.location.href = line;
    }
  </script>
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
        Name: <?php echo $array[$_COOKIE['user']]["name"];?><br>
        Company: <?php echo $array[$_COOKIE['user']]["company"];?><br>
        Room: <?php echo $array[$_COOKIE['user']]["room"];?><br>
        Allergies: <?php echo $array[$_COOKIE['user']]["allergy"];?><br>
        Favorite Food: <?php echo $array[$_COOKIE['user']]["favfood"];?><br>
      </div>
      <div class="col-md-9">
    <h2 class="text-center">Company Feed</h2>

    <form class="form" method='post' action="companyfeed.php" >
    <label for='search'>Customize by Company</label>
    <select name="selectex" class="form-control" style="max-width:10%">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      </select>
      <button type="submit" class="btn btn-default">Submit</button>

    </form>

        <table class="table table-bordered" style="max-width:75%;margin-left:auto;margin-right:auto;">
        <thead>
          <tr><th>Person Requesting</th><th>Food Requested</th><th>Comments</th><th>Time</th></tr>
        </thead>
        <tbody>

    <?php
    $requests = readRequests("requests.txt");
    $company = $_POST["selectex"];



        foreach ($requests as $key => $value) {
            echo $requests[$key]["company"];
            if ($_POST["selectex"] == $array[$requests[$key]["user"]]["company"] && $requests[$key]["stat"]=="incomplete") {
                echo "<tr onclick=\"updateRequests('".$requests[$key]["user"]."','".$requests[$key]["time"]."')\"><td>".$requests[$key]["user"]."</td><td>".$requests[$key]["food"]."</td><td>".$requests[$key]["comment"]."</td><td>".$requests[$key]["time"]."</td></tr>";
            }
        }

    ?>
    </tbody>
    </table>
  </div>
</div>
</body>
</html>
