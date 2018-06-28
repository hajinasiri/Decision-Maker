<?php
session_start();

include './includes/Tables.php';
$user = 'root';
$pass = '';
$db_name = 'test';
  //connecting to the database
$db = new mysqli('localhost', $user, $pass, $db_name) or die("unable to connect to database test");

$result_link = "http://localhost:8080/r/".$_POST['result_link'];
$choice_ids = unserialize($_POST ['choice_ids']);

$ranks = unserialize($_POST ['ranks']);
$votes =$_POST['vote'];

for($i=0; $i<sizeof($choice_ids); $i++){
  // echo "id= ".$choice_ids[$i]." rank= ".$ranks[$i]."vote=  ".$votes[$i];
  $id = (int)$choice_ids[$i];
  $rank = (int)$ranks[$i];
  $vote = (int)$votes[$i];
  $result = $rank + $vote;
  Tables::insert_choice($db,$id,$result);
  $_SESSION['result_link'] = $result_link ;
}
   header("Location: http://localhost:8080/dmaker/t.php");
   exit;

?>
