<?php
/*Description: Reads in username and time from GET and updates that sepcific request in requests.txt to show the accepted request.
  Created by: Chris Daves
  Created On: 22 NOV 2017
  Last Edited: 14 DEC 2017
*/
//reads all the requests
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
      $request[$count]['doneBy'] = $l[5];
      $line = fgets($fp);
      $count++;
    }
    fclose($fp);
    //close the file
    return $request;
  }
//updates requests.txt to reflect changes
  function updateRequests($user,$time,$requests){
    $f = fopen("requests.txt", 'w');
    fclose($f);
    foreach ($requests as $key => $value) {
      $file = fopen("requests.txt","a");
      if($requests[$key]["user"]==$user && $requests[$key]["time"]==$time){
        $order = $requests[$key]['user'].";".$requests[$key]['food'].";".$requests[$key]["comment"].";".$time.";complete;".$_COOKIE["user"]."\n";
        fwrite($file, $order);
        fclose($file);
      }
      else{
        $order = $requests[$key]['user'].";".$requests[$key]['food'].";".$requests[$key]["comment"].";".$requests[$key]["time"].";".$requests[$key]["stat"].";".$requests[$key]["doneBy"];
        fwrite($file, $order);
        fclose($file);
      }
    }

    fclose($file);
  }
  $r = readRequests("requests.txt");
  //the variables are hardcoded into the URL
  if(isset($_GET["user"])){
    updateRequests($_GET["user"],$_GET["time"],$r);
  }
//sends webpage back to the original page with an updated requests.txt
  header("location: feed.php");
  // echo"<pre>";
  // print_r($r);
  // echo"</pre>";
?>

