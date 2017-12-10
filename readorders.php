<!DOCTYPE PHP>
<html>

<?php
  session_start();
  if(!isset($_SESSION['user'])) {
    ?><script type="text/javascript">
      document.location = "welcomePage.php";
    </script><?php
  }
?>

<!--create page and metas-->
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Table of All Requests for KingHallEats">
  <meta name="keywords" content="King, Hall, Eats, Food, Request, Table">
  <meta name="author" content="Lani Davis">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="http://grfx.cstv.com/graphics/school-logos/navy-lg.png">
  <title>Food Request</title>
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
   <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="default.css">
  <title>All Food Request</title>
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
                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
              </div>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="./food_request.php">Request Food</a></li>
          <li><a href="./feed.php">NewsFeed</a></li>
          <li><a href="./updateprof.php">Profile</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>

    <?php
    $filename="Logs/requests.txt";
    // Open the file
    $fp = fopen($filename, 'r');

  // Add each line to an array
    if (!$fp) {                    //check that file opened ok
      echo "<p>ERROR! Could not open file $fileName for reading.</p>";
    } else {
        //set counter to 0
        $i=0;
        //go through file
        while (! feof($fp)) {
          //store each line in array
            $array[$i]=fgets($fp);
            $i=$i+1;
        }
        for ($j=0; $j<count($array); $j++) {
            //go through each line stored in array and explode into another array based off of semicolon character
            $secarray[$j]=explode(";", $array[$j]);
        }
        //close file
        fclose($fp);
    }
    ?>
    <div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-2 jumbotron">
        <h3 class="text-center"><?php echo $_SESSION['username'];?></h3><br>
        <div style="max-width:75%;margin-left:auto;margin-right:auto;background-color:white;">
          <img src="IDONTKNOW" alt="Profile Picture">
        </div>
        <br>
        Name: <?php echo $data[$_SESSION['username']]['fullname'];?><br>
        Company: <?php echo $data[$_SESSION['username']]['company'];?><br>
        Room: <?php echo $data[$_SESSION['username']]['room'];?><br>
        Bio: <?php echo $data[$_SESSION['username']]['bio'];?><br>
      </div>
      <div class="col-md-9 text-center">
        <!--print table-->
        <table class="table">
          <thead>
            <tr><th>Username</th><th>Food</th><th>Comments</th><th>Time</th><th>Status</th></tr>
          </thead>
          <tbody>
            <?php
            //go through array and get value then print out values in table
            for ($j=0; $j<(count($array)-1); $j++) {
                $username=$secarray[$j][0];
                $food=$secarray[$j][1];
                $comment=$secarray[$j][2];
                $time=$secarray[$j][3];
                $status=$secarray[$j][4];
                echo"<tr><td>$username</td><td>$food</td><td>$comment</td><td>$time</td><td>$status</td></tr>";
            }
             ?>
          </tbody>
          <tfoot></tfoot>
        </table>
      <!--<pre> <?php// print_r($_POST);?> </pre>-->
    </div>
  </div>
 </body>
</html>
