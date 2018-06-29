<?php
session_start();
if(isset($_SESSION['result_link'])){
  $result_link = $_SESSION['result_link'];
  $vote_link = $_SESSION['vote_link'];
}
?>

<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="../styles/completed.css" type="text/css">
  <?php include './_header.php'?>
</head>
<h2> Your pole is created</h2>
<div class="content">
  <div class="description">Here is the link which you can send the participants to vote</div>
  <div class="link">
    <a href= <?php
            echo "http://localhost:8080/dmaker/p/".$vote_link;
            ?>
    > <?php echo "http://localhost:8080/dmaker/p/".$vote_link; ?></a>
  </div>
  <div class="description">and here is the link where you can see the result</div>
  <a href= <?php
          echo "http://localhost:8080/dmaker/p/".$result_link;
          ?>
  ><?php echo "http://localhost:8080/dmaker/p/".$result_link;?></a>
</div>