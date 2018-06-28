<?php
  session_start();
  $choices = $_SESSION['choices'] ;
  $question = $_SESSION['question'];
  $result_link = $_SESSION['result_link'];
  ?>
<!DOCTYPE html>
<html>
<body>
  <h2><?php echo $question?></h2>
  <div>Vote for each choice with a number between 1 and <?php echo (sizeof($choices)) ?></div>
  <form name="votes" method="post" action="../insert_choice.php">
    <input type="hidden" name="result_link" value="<?php echo $result_link?>" />
    <input type="hidden" name="choice_ids" value="<?php echo htmlentities($choice_ids) ?>" />
    <input type="hidden" name="ranks" value="<?php echo htmlentities($ranks) ?>" />
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