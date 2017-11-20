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
  $users = readUsers("users.txt");
  $requests = readRequests("requests.txt");
  $deliveries = 0;
  foreach ($requests as $key) {
    if($requests[$key]['stat'] == "complete"){
      $deliveries++;
    }
  }
  echo "Number of Users: ".sizeof($users)."<br>";
  echo "Total Requests Made: ".sizeof($requests)."<br>";
  echo "Requests Filled (Deliveries): ".$deliveries."<br>";
?>
