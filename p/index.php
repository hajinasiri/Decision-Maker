<?php
include '../includes/Tables.php';

  $user = 'root';
  $pass = '';
  $db_name = 'test';

  //connecting to the database
  $db = new mysqli('localhost', $user, $pass, $db_name) or die("unable to connect to database test");

  $vote_link = ($_GET['l']);
  $data = Tables::get_pole_by_vote_link($db,$vote_link);
  $question = $data['question'];
  $pole_id = $data['id'];
  $result_link = $data['result_link'];

  $choices_data = Tables::get_choices_by_pole_id($db,$pole_id);
  $choices = $choices_data[0];
  $ranks = $choices_data[1];
  $choice_ids = $choices_data[2];
  var_dump($choice_ids);
  $db->close();
?>
<!DOCTYPE html>
<html>
<body>
  <div>Vote for each choice with a number between 1 and <?php echo (sizeof($choices)) ?></div>
  <form name="votes" method="post" action="../thanks.php">
    <input type="hidden" name="result_link" value="<?php echo $result_link?>" />
    <input type="hidden" name="choice_ids" value="<?php echo $choice_ids?>" />
    <?php
    for($i=0; $i<sizeof($choices); $i++){
      echo "<div>
          <span>".$choices[$i]."</span>
          <span><input type='text' name='option[]'' placeholder='Enter an option' class='form-control name_list'/>
          </div>";
    }
    ?>
    <input type="submit" name="submit" id="submit" class="submit" value="Submit" />
  </form>
  </div>
<body>