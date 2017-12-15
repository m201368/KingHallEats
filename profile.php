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
function checkInfo($array){
  if(isset($array[$_POST["user"]])){
    if($array[$_POST["user"]]["pass"] == sha1($_POST["pass"])){
      return true;
    }
  }
  else{return false;}
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
    $array[$count]['doneBy'] = $l[5];
    $line = fgets($fp);
    $count++;
  }
  fclose($fp);                   //close the file
  return $array;
}
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

$array  = readUsers("users.txt");
$user = $_COOKIE["user"];

if(isset($_POST['pass']) && (!isset($array[$_COOKIE['user']]) || sha1($_POST['pass']) != $array[$_POST['user']]['pass'])){
  require_once('logout.php');
}

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $user."'s"; ?> Profile Page</title>

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
    <div class="col-md-1"></div>
    <div class="col-md-2 jumbotron">
      <h3 class="text-center"><?php echo $_COOKIE['user'];?></h3><br>
      Name: <?php echo $array[$_COOKIE['user']]["name"];?><br>
      Company: <?php echo $array[$_COOKIE['user']]["company"];?><br>
      Room: <?php echo $array[$_COOKIE['user']]["room"];?><br>
      Allergies: <?php echo $array[$_COOKIE['user']]["allergy"];?><br>
      Favorite Food: <?php echo $array[$_COOKIE['user']]["favfood"];?><br>
      <br><span class="text-center"><a href="./updateprof.php">Update your Profile!</a></span>
    </div>
    <div class="col-md-9 text-center">
      <br>
      <h3>Requests:</h3>
      <?php
        $requests = readRequests("requests.txt");
        foreach ($requests as $key => $value) {
          if($requests[$key]["user"]==$user){
             echo "Request: ".$requests[$key]["food"]." Comment: ".$requests[$key]["comment"]." Status: ".$requests[$key]["stat"]." Fulfilled By: ".$requests[$key]["doneBy"]."<br>";
           }
        }

      ?>
      <br>
      <a href="food_request.php">Request Food!</a><br>
      <br>
      <h3>Your Friends Are:</h3>
      <?php
        $friends = showyourfriends($user);
        foreach ($friends as $key => $value) {
          echo $value."<br>";
        }
      ?>
      <br>
      <a href="addfriend.php">Add a Friend!</a>
    </div>
  </body>
</html>
