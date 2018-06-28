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

<!DOCTYPE html>
<html>
<h2> Your pole is created</h2>
<div>Here is the link which you can send the participant to vot</div>
<a href= <?php
        echo "localhost:8080/p/".$vote_link;
        ?>
> Pole link</a>
<div>and here is the link where you can see the result</div>
<a href= <?php
        echo "localhost:8080/p/".$result_link;
        ?>
> Result link</a>
