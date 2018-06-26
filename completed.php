<?php
  include "./includes/ChromePhp.php";
  include "./includes/Tables.php";

   function create_url() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVabcdefghijklmnopqrstuv1234567890';
    $url = '';
    for ($x = 0; $x <= 6; $x++) {
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
  $tables = new Tables;
  $tables->create_users($db);
  $tables->create_poles($db);
  $tables->create_choices($db);

  // print $_POST['option'][2];
  // echo sizeof($_POST['option']);

var_dump($_GET[]);

echo $code;




  $db->close();
?>