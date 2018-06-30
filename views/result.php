  <?php
  session_start();
  $choices_data = $_SESSION['choices_data'];
  $choices = $choices_data[0];
  $ranks = $choices_data[1];
  $question = $_SESSION['question'];
  ?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../styles/result.css" type="text/css">
  <?php include './_header.php'?>
</head>
<h3> Here is the result</h3>
<body>
  <h2><?php echo $question?></h2>
  <table>
    <tr>
      <th>Choices</th>
      <th>Votes</th>
    </tr>
    <div>
      <?php
        for($i=0; $i<sizeof($choices); $i++){
          echo "<tr><div><td>
                  <span>".$choices[$i]."</span></td><td>
                  <span>".$ranks[$i]."</span></td></tr>";
        }
      ?>
    </div>
  </table>
</body>