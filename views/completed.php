<?php
session_start();
if(isset($_SESSION['result_link'])){
  $result_link = $_SESSION['result_link'];
  $vote_link = $_SESSION['vote_link'];
}
?>

<!DOCTYPE html>
<html>
<h2> Your pole is created</h2>
<div>Here is the link which you can send the participant to vote</div>
<a href= <?php
        echo "http://localhost:8080/dmaker/p/".$vote_link;
        ?>
> <?php echo "http://localhost:8080/dmaker/p/".$vote_link; ?></a>
<div>and here is the link where you can see the result</div>
<a href= <?php
        echo "http://localhost:8080/dmaker/p/".$result_link;
        ?>
><?php echo "http://localhost:8080/dmaker/p/".$result_link;?></a>