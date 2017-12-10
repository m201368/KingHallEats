<!DOCTYPE html>
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
    $data = $_POST['user'].",".sha1($_POST['pass']).", ".$_POST['names'].",".$_POST['company'].", ".$_POST['room']."\n";
    fwrite($file,$data);
    if($_POST['user']!=""){echo"Thanks for making an account!";}
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
      var x = document.getElementById("form");
      var go = true;
      if(x.names.value == ""){go = false;}
      if(x.company.value == ""){go = false;}
      if(x.room.value == ""){go = false;}
      if(x.user.value == ""){go = false;}
      if(x.pass.value == ""){go = false;}

      if(go){return true;}
      else{
        alert("You need to complete all of the boxes!");
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
      <h3>Sign Up!</h3>
      <br>
      <form action="?" id="form" method="POST" onsubmit="check()">
        Name: <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="names"><br>
        Company: <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="company"><br>
        Room Number: <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="room"><br>
        Username: <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="user"><br>
        Password: <input type="text" class="form-control" style="max-width:50%;margin-left:auto;margin-right:auto;" name="pass"><br>
        <button type="submit" class="btn btn-default">Create Profile</button>
      </form>
    </div>
    </div>
    <div class="col-md-4"></div>
  </div>
</body>
</html>
