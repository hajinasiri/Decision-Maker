<?php
  session_start();
  $choices = $_SESSION['choices'] ;
  $question = $_SESSION['question'];
  $result_link = $_SESSION['result_link'];
  $ranks = $_SESSION['ranks'];
  $choice_ids = $_SESSION['choice_ids'];
  ?>
<!DOCTYPE html>
<html>
<head>
  <?php include './_header.php'?>
</head>
<body>
  <h2><?php echo $question?></h2>
  <div>Vote for each choice with a number between 1 and <?php echo (sizeof($choices)) ?></div>
  <form name="votes" method="post" action="../insert_choice.php">
    <table>
      <?php
      for($i=0; $i<sizeof($choices); $i++){
        echo "<tr>
            <td>
            <span>".$choices[$i]."</span>
            </td>
            <td>
            <span><input type='text' name='vote[]'' placeholder='Enter an option' class='vote'/>
            </td>
            </tr>";
      }
      ?>
      <table>
    <input type="submit" name="submit" id="submit" class="submit" value="Submit" />
  </form>
  </div>
<body>