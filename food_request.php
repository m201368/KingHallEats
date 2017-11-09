<!Doctype HTML>
<!--
Description: PHP file that generates a form for user food requests. PHP writes each request into Logs/requests.txt. The form makes
             use of a javascript file to generate a specific food form once the user has picked a category.
Created by : Ben Birney
Created on : 23 OCT 2017
Last Edited: 28 OCT 2017
-->
<html>

<?php
  session_start();
  if(!isset($_SESSION['user'])) {
    ?><script type="text/javascript">
      document.location = "welcomePage.php";
    </script><?php
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
  <link href="bootstrap/css.bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  if (isset($_POST['sFood'])) {
    $file = fopen("requests.txt", 'a+') or die("can't open file");
    $order = $_SESSION['user'] ."; ".($_POST['sFood'])."; ".($_POST['com'])."; ".(time())."; incomplete;\n";
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
