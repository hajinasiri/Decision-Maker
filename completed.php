<?php
  include "./includes/ChromePhp.php";
  include "./includes/Tables.php";


  //Setting parameters for connecting to the database
  $user = 'root';
  $pass = '';
  $db_name = 'test';

  //connecting to the database
  $db = new mysqli('localhost', $user, $pass, $db_name) or die("unable to connect to database test");

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



  $db->close();
?>