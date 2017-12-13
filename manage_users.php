<!Doctype HTML>
<?php
  //starts session, loads in fxns, checks if the user is currently logged in
  //if not, they're directed to the login page
  //if they're logged in but not an admin, it tells them they aren't allowed in
  session_start();
  require_once("lib_read_csv.php");
  if (!isset($_SESSION['user'])) {
    header("Location: signup.php");
    exit();
  } else {
    $CSV = read_csv("users.txt");
    if ($CSV[$_SESSION['user']]['accesslevel'] != 'admin') {
      echo "<b>You're not allowed on this page</b>";
      exit();
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
      <form class="navbar-form navbar-right" role="search">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="q">
            <div class="input-group-btn">
              <button class="btn btn-default form-control" type="submit"><i class="glyphicon glyphicon-search"></i></button>
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
  <?php
  //creates user given username, password, full name, and access level from form
  if (isset($_SESSION['user'])) {
    $file = fopen("users.txt", 'a+') or die("invalid logs");
    if (isset($_POST['addUser'])) {
      $entry = $_POST['addUser'] .", ".($_POST['pass']).", ".$_POST['name'].", ".$_POST['company'].", ".$_POST['room'].", ".$_POST['access']."\n";
      fwrite($file, $entry);
      print "<b>User Successfully Created!</b>";
    }
    if (isset($_POST['removeUser'])) {
      foreach($CSV as $user) {
        if ($user == $_POST['removeUser']) {
          foreach ($user as $userData) {
            $userData = "";
          }
        } else if ($user == "end") {
          echo "The user you wanted to remove doesn't exist!";
        }
      }
      $file = fopen("users.txt", 'w') or die("invalid logs");
      write_csv("users.txt", $CSV, True, True, True, ";");
    }
    fclose($file);
    //give the admin options to create a user
  } else { ?>
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
        <br>
        <?php }
        $CSV = read_csv("info.csv");
        print "<table class=\"table table-striped\"><thead><tr><th>Username</th><th>Password</th><th>Full Name</th><th>Access Level</th></tr></thead><tbody>";
        foreach ($CSV as $key) {
          print "<tr>";
          foreach ($key as $key2 => $value) {
            print "<td>$value</td>";
          }
          print "</tr>";
        }
        print "</tbody></table>";
        ?>
      </div>
      <div class="col-md-4"></div>
    </div>
</body>
</html>
