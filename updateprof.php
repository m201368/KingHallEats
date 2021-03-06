<!DOCTYPE html>
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
  function write_txt($filename, $data=array()) {
    if($fp = fopen($filename, 'w')) {
      foreach ($data as $row) {
          fwrite($fp, implode(",",$row));
        }
      }
      fclose($fp);

  }
  $users = readUsers("users.txt");

  if(isset($_POST["name"])){
    $users[$_COOKIE["user"]]["pass"] = sha1($_POST["pass"]);
    $users[$_COOKIE["user"]]["name"] = $_POST["name"];
    $users[$_COOKIE["user"]]["company"] = $_POST["company"];
    $users[$_COOKIE["user"]]["room"] = $_POST["room"];
    $users[$_COOKIE["user"]]["allergy"] = $_POST["allergy"];
    $users[$_COOKIE["user"]]["favfood"] = $_POST["favfood"]."\n";
    write_txt("users.txt",$users);
    header("location: profile.php");
  }
  ?>
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
    <title>KHE: Update Profile</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="default.css">
</head>
<body>
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
  <br><br><br>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-2 jumbotron">
      <h3 class="text-center"><?php echo $_COOKIE['user'];?></h3><br>
      <br>
      Name: <?php echo $users[$_COOKIE['user']]['name'];?><br>
      Company: <?php echo $users[$_COOKIE['user']]['company'];?><br>
      Room: <?php echo $users[$_COOKIE['user']]['room'];?><br>
      Allergies: <?php echo $users[$_COOKIE['user']]['allergy'];?><br>
      Favorite Food: <?php echo $users[$_COOKIE['user']]['favfood'];?><br>
    </div>
    <div class="col-md-9 text-center">
      <h3>Update Profile:</h3><br>
      <form action="?" method="POST">
        <div class="form-group">
          <input type="text" name="name"class="form-control" placeholder="Name" value="<?php echo $users[$_COOKIE['user']]['name'];?>"  style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><input type="text" name="company" class="form-control" placeholder="Company" value="<?php echo $users[$_COOKIE['user']]['company'];?>" style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><input type="text" name="room" class="form-control" placeholder="Room Number" value="<?php echo $users[$_COOKIE['user']]['room'];?>"  style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><input type="password" name="pass" class="form-control" placeholder="Password" style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><input type="text" name="allergy" class="form-control" placeholder="Allergies" value="<?php echo $users[$_COOKIE['user']]['allergy'];?>" style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><input type="text" name="favfood" class="form-control" placeholder="Favorite Food" value="<?php echo $users[$_COOKIE['user']]['favfood'];?>" style="max-width:40%;margin-left:auto;margin-right:auto;">
          <br><button type="submit" class="btn btn-default">Update Profile</button>
        </div>
      </form>
    </div>
  </div>
</body>
