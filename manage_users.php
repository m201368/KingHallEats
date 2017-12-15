<!Doctype HTML>
<?php
require_once("lib_read_csv.php");
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
  <br><br>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-2 jumbotron">
      <h3 class="text-center"><?php echo $_COOKIE['user'];?></h3><br>
      Name: <?php echo $CSV[$_COOKIE['user']]["name"];?><br>
      Company: <?php echo $CSV[$_COOKIE['user']]["company"];?><br>
      Room: <?php echo $CSV[$_COOKIE['user']]["room"];?><br>
      Allergies: <?php echo $CSV[$_COOKIE['user']]["allergy"];?><br>
      Favorite Food: <?php echo $CSV[$_COOKIE['user']]["favfood"];?><br>
    </div>
    <div class="col-md-9">
      <form method='Post' action='?'>
        <div class="row">
          <div class="col-md-12 text-center">
            <br>
            Add a user:
              <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="names" placeholder="Name"><br>
              <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="company" placeholder="Company"><br>
              <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="room" placeholder="Room #"><br>
              <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="user" placeholder="Username"><br>
              <input type="password" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="pass" id="pass" placeholder="Password"><br>
              <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="allergy" placeholder="Allergies"><br>
              <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="favfood" placeholder="Favorite Food"><br>
              <select name="access" class="form-control" style="max-width:19%;margin-left:auto;margin-right:auto;">
                <option value="">Access Level</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
              </select>
          </div>-
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 text-center">
            <br>
            <button type="submit" class="btn btn-default">Create User</button>
          </form>
            <br><br>
            <?php
            if($_POST['user']!="") {
              $file = fopen("users.txt",'a');
              $data = $_POST['user'].",".sha1($_POST['pass']).",".$_POST['names'].",".$_POST['company'].",".$_POST['room'].",".$_POST["allergy"].",".$_POST['access'].",".$_POST["favfood"]."\n";
              fwrite($file,$data);
              fclose($file);
              echo "<b>User Successfully Created!</b>";
            }
            ?>
          </div>
          <div class="col-md-4"></div>
        </div>
      </form>
      <div class="row">
        <div class="col-md-12">
          <table class="table table-bordered" style="max-width:75%;margin-left:auto;margin-right:auto;">
            <thead><tr><th>Username</th><th>Name</th><th>Company</th><th>Room</th><th>Allergies</th><th>Access</th><th>Favorite Food</th></tr></thead><tbody>
          <?php
          $CSV = readUsers("users.txt");
            foreach ($CSV as $user) {
              echo "<tr>";
              foreach ($user as $attribute=>$val) {
                if($attribute != 'pass') {
                  echo "<td>$val</td>";
                }
              }
              echo "</tr>";
            }
            echo "</tbody></table>";
          ?>
      </div>
  </div>
</body>
</html>
