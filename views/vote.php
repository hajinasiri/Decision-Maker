<?php
  session_start();
  $choices = $_SESSION['choices'] ;
  $question = $_SESSION['question'];
  $result_link = $_SESSION['result_link'];
  $ranks = $_SESSION['ranks'] = $ranks ;
  $choice_ids = $_SESSION['choice_ids'];
  ?>
<!DOCTYPE html>
<html>
<body>
  <h2><?php echo $question?></h2>
  <div>Vote for each choice with a number between 1 and <?php echo (sizeof($choices)) ?></div>
  <form name="votes" method="post" action="../insert_choice.php">
    <?php
    for($i=0; $i<sizeof($choices); $i++){
      echo "<div>
          <span>".$choices[$i]."</span>
          <span><input type='text' name='vote[]'' placeholder='Enter an option' class='vote'/>
          </div>";
    }
    ?>
    <input type="submit" name="submit" id="submit" class="submit" value="Submit" />
  </form>
  </div>
<body>