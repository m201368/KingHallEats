<!DOCTYPE PHP>
<html>
<!--create page and metas-->
<head>
  <style type="text/css">
    table, td, th {
      border: 1px solid black;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="description" content="Table of All Requests for KingHallEats">
  <meta name="keywords" content="King, Hall, Eats, Food, Request, Table">
  <meta name="author" content="Lani Davis">
  <title>All Food Request</title>
  </head>

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
  <!--print table-->
  <table>
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

</html>

