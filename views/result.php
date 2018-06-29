  <?php
  session_start();
  $choices_data = $_SESSION['choices_data'];
  $choices = $choices_data[0];
  $ranks = $choices_data[1];
  $question = $_SESSION['question'];
  ?>

  <!DOCTYPE html>
<html>
<h2> Here is the result</h2>
<body>
  <div><?php echo $question?></div>
  <div>
    <?php
      for($i=0; $i<sizeof($choices); $i++){
        echo "<div>
                <span>".$choices[$i]."</span>
                <span>".$ranks[$i]."</span>";
      }
    ?>
  </div>
</body>