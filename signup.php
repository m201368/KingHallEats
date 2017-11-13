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

?>
<?php
  $users = readUsers("users.txt");
  // echo"<pre>";
  // print_r($users);
  // print_r($_POST);
  // echo"</pre>";

  if($_POST['user']==''){echo"Welcome";}
  else if(isset($users[$_POST['user']])){
    echo "That username is taken! Please try a new one";
    $_POST['names'] = "";
  }
  else{
    $file = fopen("users.txt",'a');
    $data = $_POST['user'].", ".sha1($_POST['pass']).", ".$_POST['names'].", ".$_POST['company'].", ".$_POST['room']."\n";
    fwrite($file,$data);
    if($_POST['user']!=""){echo"Thanks for making an account!";}
  }

?>

<html>
  <script type="text/javascript">
    //make sure all boxes have been set
    function check(){
      var x = document.getElementById("form");
      var go = true;
      if(x.names.value == ""){go = false;}
      if(x.company.value == ""){go = false;}
      if(x.room.value == ""){go = false;}
      if(x.user.value == ""){go = false;}
      if(x.pass.value == ""){go = false;}

      if(go){return true;}
      else{
        alert("You need to complete all of the boxes!");
        return false;
      }
    }
  </script>
  <form action="?" id="form" method="POST" onsubmit="check()">
    Name: <input type="text" name="names"><br>
    Company: <input type="text" name="company"><br>
    Room Number: <input type="text" name="room"><br>
    Username: <input type="text" name="user"><br>
    Password: <input type="text" name="pass"><br>
    <input type="submit" name="Create Profile">
  </form>
</html>

