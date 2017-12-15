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
  $array  = readUsers("users.txt");
?>
<html>
<!--
 +Description: PHP file that welcomes user to King Hall Eats website. Provides links to every page availabe on the website, including login page.
 +Created by : Sarah Barkley
 +Created on : 23 OCT 2017
 +Last Edited: 06 NOV 2017
 +-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>KHE: Home</title>

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="default.css">
    <script src="login.js"></script>
</head>
<body>
  <?php if(!isset($_COOKIE['user'])) { ?>
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
      <form class="navbar-form navbar-right" method="POST" action="profile.php" onsubmit="return login(document.getElementById('user').value)">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" name="user" id="user">
          <input type="password" class="form-control" placeholder="Password" name="pass">
        </div>
        <button type="submit" class="btn btn-default">Log In</button>
      </form>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <?php } else { ?>
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
  <?php } ?>

  <br><br>
  <div class="row text-center">
    <h1>King Hall Eats</h1>
    <br>
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <div class="jumbotron">
          <h2 class="text-center">What we're about</h2><br>
        <p style="font-size:12pt;">
          King Hall Eats is a service provided by midshipman, for midshipman as a way to organize the delivery of food from the one and only King Hall up to your room.
        </p>
        <p style="font-size:12pt">
          Designed by midshipmen, King Hall Eats understands the struggle of walking down to King Hall to pick up food. This service is a quick way of getting other people to pick up your food on the way.
        </p>
        <p style="font-size:12pt">
          Simply submit a request and put how much you are willing to pay for the delivery in the comments.
        </p>
        <p style="font-size:12pt">
          Wait for another midshipman looking to make some cash to agree to deliver your food.
        </p>
        <p style="font-size:12pt">
          Wait for your delivery.
        </p>
        <p style="font-size:12pt">
          Enjoy!
        </p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
    </div>
    <div class="col-md-4">
      <div class="jumbotron text-center">
        <h2 class="text-center">Sign Up</h4>
        <form id="form" method="POST" action="signup.php?">
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
       <br>
     </div>
    </div>
    <div class="col-md-2"></div>
  </div>
  <div class="row text-center">
    <div class="col-md-4">
      <h4>Selection you want</h4>
      <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:30px; margin:0 auto -44px; position:relative; top:-22px; width:30px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BQNjSdjjvxr/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">Thanks 3/c Downey for this healthy breakfast! Cottage cheese, granola, berries, and bananas then drizzle on some honey and you&#39;re ready to crush your Tuesday!🍌🍓</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A post shared by King Hall Food (@kinghall_creations) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2017-02-07T13:17:02+00:00">Feb 7, 2017 at 5:17am PST</time></p></div></blockquote> <script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
    </div>
    <div class="col-md-4">
      <h4>At the price you want</h4>
      <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:30px; margin:0 auto -44px; position:relative; top:-22px; width:30px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BNZ0wZQjl5r/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">A three tiered club tuna salad sandwich with old bay chips for the native Marylander!</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:10px; margin-bottom:0; margin-top:3px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A post shared by King Hall Food (@kinghall_creations) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-11-29T18:06:22+00:00">Nov 29, 2016 at 10:06am PST</time></p></div></blockquote> <script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
    </div>
    <div class="col-md-4">
      <h4>Without ever leaving your room</h4>
      <blockquote class="instagram-media" data-instgrm-captioned data-instgrm-version="7" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:658px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:30px; margin:0 auto -44px; position:relative; top:-22px; width:30px;"></div></div> <p style=" margin:8px 0 0 0; padding:0 4px;"> <a href="https://www.instagram.com/p/BNH0FGQj5PV/" style=" color:#000; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none; word-wrap:break-word;" target="_blank">Ice cream sandwich with Oreo crumbs! 🍪🍦🍪</a></p> <p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;">A post shared by King Hall Food (@kinghall_creations) on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2016-11-22T18:14:08+00:00">Nov 22, 2016 at 10:14am PST</time></p></div></blockquote> <script async defer src="//platform.instagram.com/en_US/embeds.js"></script>
    </div>
  </div>
</body>
</html>
