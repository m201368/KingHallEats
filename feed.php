<?php

function readRequests($fileName){
  $array;
  $fp = fopen($fileName, 'r');   //open the file for reading
  $line = fgets($fp);          // read lines
  $count = 0;
  while( !feof($fp) ) {
    $l = explode(";", $line);
    $array[$count]['user'] = $l[0];
    $array[$count]['food'] = $l[1];
    $array[$count]['comment'] = $l[2];
    $array[$count]['time'] = $l[3];
    $array[$count]['stat'] = $l[4];
    $line = fgets($fp);
    $count++;
  }
  fclose($fp);                   //close the file
  return $array;
}

function showyourfriends($name){
  $array;
  $fp = fopen("friends.txt", 'r');   //open the file for reading
  $line = fgets($fp);          // read lines
  $counter=0;
  while( !feof($fp) ) {
   $l = explode(",", $line);
   if($l[0]==$name){
     $array[$counter]=$l[1];
     $counter++;
    }
   $line = fgets($fp);
  }
 fclose($fp);                   //close the file
 return $array;
}

$user = $_SESSION['user'];
$friends= showyourfriends($user);
?>

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $user; ?> Personalized Feed</title>

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
    <b><u>Welcome to your Status Feed</u></b><br>
    <?php
      echo "Name: ".$array[$user]["name"]."<br>";
    ?>
    <br>
    <b><u>Your Friend's Requests:</u></b><br>
    <?php
      $requests = readRequests("requests.txt");
      foreach ($requests as $key => $value) {
        foreach ($friends as $w => $name) {
                if($requests[$key]["user"]==$name && $requests[$key]["stat"]=="incomplete"){
          echo "".$requests[$key]["name"]."'s' Request: ".$requests[$key]["food"]." Comment: ".$request["comment"]."<br>";
        }
      }
    }
    ?>
