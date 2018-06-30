<?php
  session_start();
  include "./includes/ChromePhp.php";
  include "./includes/Tables.php";

  function create_url() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVabcdefghijklmnopqrstuv1234567890';
    $url = '';
    for ($x = 0; $x < 6; $x++) {
      $randomChar = $characters[rand(0, strlen($characters)-1)];
      $url = $url.$randomChar;
    }
    return $url;
  }
  $db = Tables::connect();

  //creating tables
  Tables::create_users($db);
  Tables::create_poles($db);
  Tables::create_choices($db);

  $email = $_POST['email'];
  $user_id = Tables::insert_user($db,$email);
  $question = $_POST['question'];
  $vote_link = create_url();
  $result_link = create_url();
  $pole_id = Tables::insert_pole($db,$user_id,$vote_link,$result_link,$question);
  $options = $_POST['option'];

  for($i=1; $i<sizeof($options); $i++) {
    $choice = $options[$i];
    Tables::insert_choices($db,$pole_id,$choice);
  }
  $_SESSION['vote_link'] = $vote_link ;
  $_SESSION['result_link'] = $result_link;
  ChromePhp::log($_SESSION['vote_link']);
  header("Location: http://localhost:8080/dmaker/views/completed.php");
  exit;
  $db->close();
?>


