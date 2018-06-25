<?php
  include './includes/ChromePhp.php';
  ChromePhp::log('Hello console!');
  ChromePhp::log("worked");


  $user = 'root';
  $pass = '';
  $db_name = 'test';
  $db = new mysqli('localhost', $user, $pass, $db_name) or die("unable to connect to database test");

  // sql to create table
  $create_poles = "CREATE TABLE IF NOT EXISTS poles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  vote_link VARCHAR(30) NOT NULL,
  result_link VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  reg_date TIMESTAMP
  )";

  $create_choices = "CREATE TABLE IF NOT EXISTS choices (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  poles_id INT(6),
  description VARCHAR(30) NOT NULL,
  rank INT(6),
  reg_date TIMESTAMP
  )";

  if (($db->query($create_poles) === TRUE) && ($db->query($create_choices) === TRUE)) {
      print "Tables poles and choices created successfully";
  } else {
      echo "Error creating table: " . $db->error;
  }

  $db->close();

?>