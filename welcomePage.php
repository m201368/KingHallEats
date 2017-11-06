<html>
<!--
 +Description: PHP file that welcomes user to King Hall Eats website. Provides links to every page availabe on the website, including login page.
 +Created by : Sarah Barkley
 +Created on : 23 OCT 2017
 +Last Edited: 25 OCT 2017
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
    <style type="text/css">
    body{
      margin-left: 10%;
      margin-right: 10%;
      margin-top: 10%;
      margin-bottom: 10%;
      font-family: 'Josefin Sans', sans-serif;
    }
    h1, h4{
      text-align: center;
    }
    </style>
</head>
<body>
  <h2>King Hall Eats</h2>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">put icon here</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="./food_request.php">Request Food</a></li>
      </ul>
      <form class="navbar-form navbar-right" method="POST" action="profile.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" name="user">
          <input type="text" class="form-control" placeholder="Password" name="pass">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <h1>Welcome to King Hall Eats!</h1>
  <h4>Based on the widely used "UberEats", King Hall Eats aims to serve the United States Naval Academy Brigade of Midshipmen through door-to-door food delivery within Bancroft Hall. This service is fully provided BY mids FOR mids!</h4>
</body>
</html>
