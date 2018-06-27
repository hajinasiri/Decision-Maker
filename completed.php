<?php
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
  $vote_link = 'localhost:8080/dmaker/p/'.create_url();
  $result_link = 'localhost:8080/dmaker/r/'.create_url();
  $poles_id = Tables::insert_pole($db,$user_id,$vote_link,$result_link,$question);
  $options = $_POST['option'];

  for($i=1; $i<sizeof($options); $i++) {
    $choice = $options[$i];
    Tables::insert_choices($db,$poles_id,$choice);
  }






  $db->close();
?>