<?php
  //returns array of all friends of person with inputed name from friends file
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


  if($_POST['name']==''){echo"Let's add some friends! Put your information in the boxes below:";}
  else{
    //add name, friend to friends.txt in each new line
    $file = fopen("friends.txt",'a');
    $data = $_POST['name'].", ".$_POST['friend']."\n";
    fwrite($file,$data);
    if($_POST['user']!=""){echo"Thanks for adding a friend!";}
  }
  // used the lines to make sure functions were working properly
  // $answer=showyourfriends($_POST['name']);
  //  echo"<pre>";
  //  print_r($_POST);
  //  print_r($answer);
  //  echo"</pre>";

?>
<html>
  <script type="text/javascript">
    //make sure all boxes have been set
    function check(){
      var x = document.getElementById("form");
      var go = true;
      if(x.names.value == ""){go = false;}
      if(x.friend.value == ""){go = false;}
      if(go){return true;}
      else{
        alert("You need to complete all of the boxes!");
        return false;
      }
    }
  </script>
  <form action="?" id="form" method="POST" onsubmit="check()">
    What is your username: <input type="text" name="name"><br><!-- replace later with session variable for username -->
    What is your friend's username? <input type="text" name="friend"><br>
    <input type="submit" name="Add Friend">
  </form>
</html>
