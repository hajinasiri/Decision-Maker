<?php
session_start();
if(isset($_SESSION['result_link'])){
  $result_link = $_SESSION['result_link'];
    unset($_SESSION['result_link']); // clear the value so that it doesn't display again
}
?>

<!DOCTYPE html>
<html>
<body>
  <div>Thank you for using Dmaker</div>
  <div><a href= <?php
        echo "http://localhost:8080/dmaker/r/".$result_link;
        ?>
        > You can see the result here</a>
  </div>
</body>
