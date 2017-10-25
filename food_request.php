<!Doctype HTML>
<html>

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
    $file = fopen("Logs/requests.txt", 'a') or die("can't open file");
    $order = "username; ".serialize($_POST['sFood'])."; ".serialize($_POST['com'])."; ".serialize(time())."; incomplete;\n";
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
