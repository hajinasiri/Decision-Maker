<?php
  session_start();
  include '../includes/Tables.php';
  include '../includes/ChromePhp.php';

  $user = 'root';
  $pass = '';
  $db_name = 'test';

  //connecting to the database
  $db = new mysqli('localhost', $user, $pass, $db_name) or die("unable to connect to database test");

  $vote_link = ($_GET['l']);
  $data = Tables::get_pole_by_vote_link($db,$vote_link);
  $question = $data['question'];
  $pole_id = $data['id'];
  $result_link = $data['result_link'];

  $choices_data = Tables::get_choices_by_pole_id($db,$pole_id);
  $choices = $choices_data[0];
  $ranks = $choices_data[1];
  $choice_ids = $choices_data[2];
  //setting the session and redirecting to the view page
  $_SESSION['choices'] = $choices ;
  $_SESSION['ranks'] = $ranks ;
  $_SESSION['question'] = $question ;
  $_SESSION['result_link'] = $result_link;
  $_SESSION['choice_ids'] = $choice_ids ;
  header("Location: http://localhost:8080/dmaker/views/vote.php");
  exit;
  $db->close();
?>
