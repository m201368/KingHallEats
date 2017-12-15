<!Doctype HTML>
<!--
Description: PHP file that generates a form for user food requests. PHP writes each request into Logs/requests.txt. The form makes
             use of a javascript file to generate a specific food form once the user has picked a category.
Created by : Ben Birney
Created on : 23 OCT 2017
Last Edited: 28 OCT 2017
-->
<html>

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
  $array = readUsers("users.txt");
  if(!isset($_COOKIE['user'])) {
    ?><script type="text/javascript">
      document.location = "welcomePage.php";
    </script><?php
  }
?>

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Food Request for KHE">
  <meta name="keywords" content="food, request, king, hall, kinghalleats">
  <meta name="author" content="Ben Birney">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Food Request</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="default.css">
  <script src="pscripts.js"></script>
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
      Name: <?php echo $array[$_COOKIE['user']]["name"];?><br>
      Company: <?php echo $array[$_COOKIE['user']]["company"];?><br>
      Room: <?php echo $array[$_COOKIE['user']]["room"];?><br>
      Allergies: <?php echo $array[$_COOKIE['user']]["allergy"];?><br>
      Favorite Food: <?php echo $array[$_COOKIE['user']]["favfood"];?><br>
    </div>
  <?php
  if (isset($_POST['sFood'])) {
    ?> <div class="col-md-9 text-center"><?php
    $file = "requests.txt";
    if(file_exists($file)) {
      $fin = fopen($file, "a+") or die("you cant write to the file");
      $order = $_COOKIE['user'].";".($_POST['sFood']).";".($_POST['com']).";".(date('Y-m-d H:i:s', time())).";incomplete;nobody\n";
      fwrite($fin, $order);
      fclose($file);
      print "<b>Thanks for submitting a request!</b>";
    } else {
      echo "file doesnt exist";
    }
    ?></div><?php
  } else { ?>
    <div class="col-md-9 text-center">
      <div class="text-center">
          <a class="btn btn-primary" href="./today's_menu.php" role="button" style="margin-left:auto;margin-right:auto;">Today's Menu</a>
        </div>
      <h2>Request Food</h2>
      <form method='Post' action='?'>
        <select id="cat" style="max-width:50%;margin-left:auto;margin-right:auto;" class="form-control" onchange="specificRequest()">
          <option value=" ">Food Category</option>
          <option value="meal">Meal</option>
          <option value="dairy">Dairy</option>
          <option value="cereal">Cereal</option>
          <option value="produce">Produce</option>
          <option value="snax">Snacks</option>
        </select>
        <br>
        <div id="specificFood"></div>
        <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="com" placeholder="Comments">
        <br>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div>
  <?php } ?>
</body>

</html>
