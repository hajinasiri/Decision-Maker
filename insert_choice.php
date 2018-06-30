<?php
  session_start();
  include './includes/Tables.php';

  $db = Tables::connect();
  $result_link = $_SESSION['result_link'];
  $choice_ids = $_SESSION['choice_ids'];

  $ranks = $_SESSION['ranks'];
  $votes =$_POST['vote'];

  for($i=0; $i<sizeof($choice_ids); $i++){
    $id = (int)$choice_ids[$i];
    $rank = (int)$ranks[$i];
    $vote = (int)$votes[$i];
    $result = $rank + $vote;
    Tables::update_choice($db,$id,$result);
  }
  $_SESSION['result_link'] = $result_link ;
  header("Location: http://localhost:8080/dmaker/views/thanks.php");
  exit;

?>
