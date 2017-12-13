<!DOCTYPE html>

<!--
 +Description: PHP file that allows users to contact the staff for feedback.
 +Created by : Lani Davis
 +Created on : 5 NOV 2017
 +Last Modified by: Ben Birney
 +Last Modified on: 12 DEC 2017
 +Modified by: Ben Birney, Lani Davis, Chris Daves
 +-->

<html>
<?php

//Check if the cookie 'user' has been set, if it has not, calls the header function.
  if(!isset($_COOKIE['user'])) {
    header("Location: welcomePage.php");
  }

  // readUsers function takes in a file name.
  // It opens the file passed in by reference and breaks it into an easily navigatable associative array.
  // readUsers returns an array of current users.
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
  $users = readUsers("users.txt");

  // showyourfriends function returns an array with all friends of a given name
  function showyourfriends($name){
    $array;
   $fp = fopen("friends.txt", 'r');   //open the file for reading
   $line = fgets($fp);          // read lines
   $counter=0;
   while( !feof($fp) ) {
     $l = explode(",", $line);
     if($l[0]==$name){
       $array[$counter]=$l[1];
       $counter++;
      }
     $line = fgets($fp);
   }
   fclose($fp);                   //close the file
   return $array;
  }

    //add friend to friends.txt in each new line
    $file = fopen("friends.txt",'a');
    if("" != trim($_POST['friend'])){
      $data = $_COOKIE['user'].",".$_POST['friend']."\n";
      fwrite($file,$data);
      $stuff = "Thanks for adding a friend! Return to your <a href='profile.php'> profile page</a>.";
    }
?>
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Add a friend">
  <meta name="keywords" content="friend, request, king, hall, kinghalleats">
  <meta name="author" content="Lani Davis">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="http://grfx.cstv.com/graphics/school-logos/navy-lg.png">
  <title>Add a friend</title>
  <!-- Bootstrap -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="default.css">

  <script type="text/javascript">

  // check function verifies that all of the inputs have been filled.
    function check(){
      var x = document.getElementById("form");
      var go = true;

      if(x.friend.value == ""){go = false;}
      if(go){return true;}
      else{
        alert("You need to complete all of the boxes!");
        return false;
      }
    }
  </script>
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
      Name: <?php echo $array[$user]["name"];?><br>
      Company: <?php echo $array[$user]["company"];?><br>
      Room: <?php echo $array[$user]["room"];?><br>
      Allergies: <?php echo $array[$user]["allergy"];?><br>
      Favorite Food: <?php echo $array[$user]["favfood"];?><br>
    </div>
    <div class="col-md-9">
      <p id="paragraph1">
        <h1>Add a friend!</h1>
      </p>
      <form action="?" id="form" method="POST" onsubmit="check()">
        What is your friend's username?<br>
        <input type="text" name="friend"><br>
        <input type="submit" name="Add Friend">
      </form>
      <?php echo $stuff;?>
    </div>
</body>
</html>
