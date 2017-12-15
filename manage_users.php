<!Doctype HTML>
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
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Create user for Cool Website">
  <meta name="keywords" content="admin, create, user, cs, usna, lab12, it350">
  <meta name="author" content="Ben Birney">
  <title>Create User</title>
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
  <link href="bootstrap/css.bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
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
              <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="">Admin
          <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./manage_users.php">Manage Users</a></li>
            <li><a href="./stats.php">Statistics</a></li>
          </ul>
        </li>
        <li><a href="./food_request.php">Request Food</a></li>
        <li><a href="./feed.php">NewsFeed</a></li>
        <li><a href="./profile.php">Profile</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

    <form method='Post' action='?'>
      <div class="row">
        <div class="col-md-6 text-center">
          <br>
          Add a user:
          <input type="text" name="addUser" class="form-control" placeholder="Username" style="max-width:50%;margin-left:auto;margin-right:auto;">
          <br><input type="password" name="pass" class="form-control" placeholder="Password" style="max-width:50%;margin-left:auto;margin-right:auto;">
          <br><input type="text" name="name" class="form-control" placeholder="Full Name" style="max-width:50%;margin-left:auto;margin-right:auto;">
          <br><input type="text" name="name" class="form-control" placeholder="Room" style="max-width:50%;margin-left:auto;margin-right:auto;">
          <br><select name="access">
            <option value="">Access Level</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
          </select>
        </div>
        <div class="col-md-6 text-center">
          <br>
          Remove a User:
          <br><input type="text" class="form-control" name="removeUser" placeholder="Username" style="max-width:50%;margin-left:auto;margin-right:auto;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 text-center">
          <br>
          <input type="Submit" value="Create/Remove User">
        </div>
        <div class="col-md-4"></div>
      </div>
    </form>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">

      </div>
      <div class="col-md-4"></div>
    </div>
</body>
</html>
