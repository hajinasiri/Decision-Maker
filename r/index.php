  <?php
  session_start();
  include '../includes/Tables.php';
  include '../includes/ChromePhp.php';

  $user = 'root';
  $pass = '';
  $db_name = 'test';
  //connecting to the database
  $db = new mysqli('localhost', $user, $pass, $db_name) or die("unable to connect to database test");
  $result_link = ($_GET['l']);
  $data = Tables::get_pole_by_result_link($db,$result_link);
  $pole_id = $data['id'];
  echo $pole_id;
  ?>