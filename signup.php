<!DOCTYPE html>
<html>

<?php
  session_start();
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

?>
<?php
  $users = readUsers("users.txt");
  // echo"<pre>";
  // print_r($users);
  // print_r($_POST);
  // echo"</pre>";

  if($_POST['user']==''){echo"Welcome";}
  else if(isset($users[$_POST['user']])){
    echo "That username is taken! Please try a new one";
    $_POST['names'] = "";
  }
  else{
    $file = fopen("users.txt",'a');
    $data = $_POST['user'].",".sha1($_POST['pass']).",".$_POST['names'].",".$_POST['company'].",".$_POST['room'].",".$_POST["allergy"].",user,".$_POST["favfood"]."\n";
    fwrite($file,$data);
    $_SESSION["user"] = $_POST["user"];
    header("location: welcomePage.php");
  }

?>

<head>
  <meta charset="utf-8">
  <meta name="description" content="Sign Up for KHE">
  <meta name="keywords" content="signup, king, hall, kinghalleats">
  <meta name="author" content="Chris Daves">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Sign Up</title>

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
  <script type="text/javascript">
    //make sure all boxes have been set
    function check(){
      var x = document.getElementById("pass").value;
      var y = document.getElementById("pass1").value;
      if(x === y){
        return true;
      }
      else{
        alert("The passwords do not match.");
        return false;
      }
    }
  </script>
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
      <form class="navbar-form navbar-right" method="POST" action="profile.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" name="user">
          <input type="password" class="form-control" placeholder="Password" name="pass">
        </div>
        <button type="submit" class="btn btn-default">Log In</button>
      </form>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center">
      <br><br>
      <div class="jumbotron text-center">
      <h2>Sign Up!</h2>
      <br>
      <form action="?" method="POST" onsubmit="return check()">
        <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="names" placeholder="Name"><br>
        <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="company" placeholder="Company"><br>
        <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="room" placeholder="Room #"><br>
        <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="user" placeholder="Username"><br>
        <input type="password" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="pass" id="pass" placeholder="Password"><br>
        <input type="password" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="pass1" id="pass1" placeholder="Re-enter Password"><br>
        <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="allergy" placeholder="Allergies"><br>
        <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="favfood" placeholder="Favorite Food"><br>
        <button type="submit" class="btn btn-default">Create Profile</button>
      </form>
    </div>
    </div>
    <div class="col-md-4"></div>
  </div>
</body>
</html>
