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
    <h1><b><u>Company Feed</u></b></h1>

    <form class="form"method='post' action="" >
    <label for='search'>Search for a request by Company</label>
    <select name="selectex">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
</select>
       <input type="submit" value="Search">

    </form>

    <h3><b><u>Current Requests:</u></b></h3>
    <div class="row">
    <div class="col-md-offset-1 col-md-6">
<table class="table table-bordered">
      <thead>
        <tr><th>Person Requesting</th><th>Food Requested</th><th>Comments</th><th>Time</th></tr>
      </thead>
      <tbody>

    <?php
    $requests = readRequests("requests.txt");
    // echo"<pre>";
    // print_r($requests);
    // echo"</pre>";
    $company = $_POST["selectex"];


foreach ($array as $key => $value) {
  $name="";
  if($array[$key]["company"]==$company)
  {
    $name=$array[$key]["user"];
  //  echo $name." named";
  }
  //echo "".$array[$key]["company"]."   company<br>";
        foreach ($requests as $key => $value) {
            // $requester=$requests[$key]["stat"];
            // $tester="incomplete";
            // echo $name." name<br>";
            // echo $requests[$key]["user"]," requester<br><br>";
            //echo strcmp($name,$requests[$key]["user"])." result of strcmp <br><br>";
            if (strcmp($name,$requests[$key]["user"])==0) {
              //<tr onclick=\"agreetodeliver()\">
                echo "<tr><td>".$requests[$key]["user"]."</td><td>".$requests[$key]["food"]."</td><td>".$requests[$key]["comment"]."</td><td>".$requests[$key]["time"]."</td></tr>";
            }
        }
    }
    ?>
    </tbody>
    </table>
</div>
</div>
