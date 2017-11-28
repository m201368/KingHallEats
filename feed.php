<?php
  session_start();
  if(isset($_SESSION["user"])) {
    $user = $_SESSION["user"];
  } else {
    header("location: welcomePage.php?fail=yes");
  }
  function readUsers($fileName)
  {
    $array;
    $fp = fopen($fileName, 'r');   //open the file for reading
    $line = fgets($fp);          // read lines
    while (!feof($fp)) {
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
  $array  = readUsers("users.txt");
  $user = $_SESSION["user"];

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
  // function agreetodeliver()
  // {
  //     header("location: deliver.php");
  // }
function showyourfriends($name)
{
  $friend;
  $fp = fopen("friends.txt", 'r');   //open the file for reading
  $line = fgets($fp);          // read lines
  $counter=0;
  while (!feof($fp)) {
    $l = explode(",", $line);
    if ($l[0]==$name) {
      $friend[$counter]=$l[1];
      $counter++;
    }
    $line = fgets($fp);
  }
  fclose($fp);                   //close the file
  return $friend;
}


$friends = showyourfriends($user);

?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Personalized Feed</title>

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
    <h1><b><u>Welcome to your Status Feed </u></b></h1>

    <h3><b><u>Your Friend's Current Requests:</u></b></h3>
    <div class="row">
      <div class="col-md-offset-1 col-md-6">
        <table class="table table-bordered">
          <thead>
            <tr><th>Friend's name</th><th>Request</th><th>Comments</th></tr>
          </thead>
          <tbody>
            <?php
              $requests = readRequests("requests.txt");
              // echo"<pre>";
              // print_r($requests);
              // echo"</pre>";
              for ($i=0; $i<sizeof($friends); $i++) {
                  $name=$friends[$i];

                  foreach ($requests as $key => $value) {
                      // $requester=$requests[$key]["stat"];
                      // $tester="incomplete";
                      // echo $name." name<br>";
                      // echo $requests[$key]["user"]," requester<br><br>";
                      // echo strcmp($name,$requests[$key]["user"])." result of strcmp <br><br>";
                      if (strcmp($name,$requests[$key]["user"])==1) {
                        //<tr onclick=\"agreetodeliver()\">
                          echo "<tr><td>".$requests[$key]["user"]."</td><td>".$requests[$key]["food"]."</td><td>".$requests[$key]["comment"]."</td></tr>";
                      }
                  }
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <h3><b><u>Your Current Requests:</u></b></h3>
    <div class="row">
      <div class="col-md-offset-1 col-md-6">
        <table class="table table-bordered">
          <thead>
            <tr><th>Request</th><th>Comments</th><th>Status</th></tr>
          </thead>
          <tbody>
            <?php
               //$requests = readRequests("requests.txt");
                foreach ($requests as $key => $value) {
                  // echo $requests[$key]["food"]."  from key    ";
                  //
                  // echo "<br>".strcmp($requests[$key]["user"],$user)." result of strcmp<br>";
                    if (strcmp($user,$requests[$key]["user"])==0) {

                      //echo "funny";
                        echo "<tr><td>".$requests[$key]["food"]."</td><td>".$requests[$key]["comment"]."</td><td>".$requests[$key]["stat"]."</td></tr>";
                    }
                }

            ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
