<!Doctype HTML>
<!--
Description: PHP file that generates a form for user food requests. PHP writes each request into Logs/requests.txt. The form makes 
             use of a javascript file to generate a specific food form once the user has picked a category.
Created by : Ben Birney
Created on : 23 OCT 2017
Last Edited: 25 OCT 2017
-->
<html>

<?php
  if(!isset($_SESSION['username'])) {
    session_start();
    $_SESSION['username'] = "fillerUsername"; //Sessions will start when the user logs in (this is for the demo)
  }
?>
  
<head>
  <style type="text/css">
    table, td, th {
      border: 1px solid black;
    }
  </style>
  <meta charset="UTF-8">
  <meta name="description" content="Food Request for KingHallEats">
  <meta name="keywords" content="King, Hall, Eats, Food, Request">
  <meta name="author" content="Ben Birney">
  <title>Food Request</title>
  <script type="text/javascript" src="pscripts.js"></script>
</head>

<body bgcolor=#aaaaa>
  <?php
  if (isset($_POST['sFood'])) {
    $file = fopen("Logs/requests.txt", 'a+') or die("can't open file");
    $order = "username; ".($_POST['sFood'])."; ".($_POST['com'])."; ".(time())."; incomplete;\n";
    fwrite($file, $order);
    fclose($file);
    print "<b>Thanks for submitting a request!</b>";
  } else { ?>
    <form method='Post' action='?'>
      <select id="cat" onchange="specificRequest()">
        <option value=" ">Food Category</option>
        <option value="meal">Meal</option>
        <option value="dairy">Dairy</option>
        <option value="cereal">Cereal</option>
        <option value="produce">Produce</option>
        <option value="snax">Snacks</option>
      </select>
      <br>
      <div id="specificFood"></div>
      <input type="text" name="com" placeholder="Comments">
      <input type="Submit" value="Submit">
    </form>
  <?php } ?>
</body>

</html>
