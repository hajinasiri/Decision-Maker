  <?php
  session_start();
  include '../includes/Tables.php';
  include '../includes/ChromePhp.php';

  $db = Tables::connect();
  $result_link = ($_GET['l']);
  $data = Tables::get_pole_by_result_link($db,$result_link);
  $question = $data['question'];
  $pole_id = $data['id'];
  $choices_data = Tables::get_choices_by_pole_id($db,$pole_id);
  $_SESSION['choices_data'] = $choices_data ;
  $_SESSION['question'] = $question ;
  header("Location: http://localhost:8080/dmaker/views/result.php");
  exit;
  $db->close();
?>
  ?>