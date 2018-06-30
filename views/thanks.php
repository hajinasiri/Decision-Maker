<?php
session_start();
if(isset($_SESSION['result_link'])){
  $result_link = $_SESSION['result_link'];
    // unset($_SESSION['result_link']);
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../styles/thanks.css" type="text/css">
  <?php include './_header.php'?>
</head>
<body>
  <div class="thanks">Thank you for using Dmaker</div>
  <div class="link"><a href= <?php
        echo "http://localhost:8080/dmaker/r/".$result_link;
        ?>
        > You can see the result here</a>
  </div>
</body>
