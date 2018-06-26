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
  $tables = new Tables;
  $tables->create_users($db);
  $tables->create_poles($db);
  $tables->create_choices($db);

  $db->close();

?>