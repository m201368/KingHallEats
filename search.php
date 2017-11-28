<?php
function readRequests($fileName)
{
    $request;
    $fp = fopen($fileName, 'r');   //open the file for reading
  $line = fgets($fp);          // read lines
  $count = 0;
    while (!feof($fp)) {
        $l = explode(";", $line);
        $request[$count]['user'] = $l[0];
        $request[$count]['food'] = $l[1];
        $request[$count]['comment'] = $l[2];
        $request[$count]['time'] = $l[3];
        $request[$count]['stat'] = $l[4];
        $line = fgets($fp);
        $count++;
    }
    fclose($fp);
    //close the file
    return $request;
}




?>

<html>
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Search Page</title>

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
  </head>
  <body>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  </head>
  <body>
    <h1><b><u>Search Page</u></b></h1>

    <form class="form"method='post' action="" >
    <label for='search'>Search for a request</label>
      <input type='text' name='search' id='search'>
       <input type="submit" value="Search">

    </form>

    <h3><b><u>Current Requests:</u></b></h3>
    <div class="row">
    <div class="col-md-offset-1 col-md-6">
<table class="table table-bordered">
      <thead>
        <tr><th>Person Requesting</th><th>Food Requested</th><th>Comments</th><th>Time</th><th>Status</th></tr>
      </thead>
      <tbody>

    <?php

      $requests = readRequests("requests.txt");

        foreach ($requests as $key => $value) {
          if($_POST['search']==""){
          $requester=$requests[$key]["stat"];
          $tester="incomplete";
          if (strpos($requester, $tester)== true) {

                echo "<tr><td>".$requests[$key]["user"]."</td><td>".$requests[$key]["food"]."</td><td>".$requests[$key]["comment"]."</td><td>".$requests[$key]["time"]."</td><td>".$requests[$key]["stat"]."</td></tr>";
        }
      }else{
        $requester=$requests[$key]["stat"];
        $tester="incomplete";
        $user=$requests[$key]["user"];
        $food=$requests[$key]["food"];
        $comment=$requests[$key]["comment"];

        if (strpos($requester, $tester)== true && (strpos($user,$_POST['search'])!==FALSE || strpos($food,$_POST['search'])!==FALSE || strpos($comment,$_POST['search'])!==FALSE )) {

              echo "<tr><td>".$requests[$key]["user"]."</td><td>".$requests[$key]["food"]."</td><td>".$requests[$key]["comment"]."</td><td>".$requests[$key]["time"]."</td><td>".$requests[$key]["stat"]."</td></tr>";
      }
      }
      }

    ?>
    </tbody>
    </table>
</div>
</div>
