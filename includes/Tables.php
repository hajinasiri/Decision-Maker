<?
  class Tables {

    function __construct() {
    }

    function create_users($db) { // this is the hello() function
      $create_users = "CREATE TABLE IF NOT EXISTS users(
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      email VARCHAR(30)
      )";
      $result = mysqli_query($db,$create_users);
      if ($result === TRUE) {
        ChromePhp::log( "Table users was created successfully");
        } else {
        ChromePhp::log("Error creating table: " . $db->error);
      }
     }

    function create_poles($db) {
      $create_poles = "CREATE TABLE IF NOT EXISTS poles (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      user_id INT(6) UNSIGNED,
      vote_link VARCHAR(30) NOT NULL,
      result_link VARCHAR(30) NOT NULL,
      question VARCHAR(100) NOT NULL,
      reg_date TIMESTAMP,
      FOREIGN KEY (user_id) REFERENCES users(id)
      )";
      $result = mysqli_query($db,$create_poles);
      if ($result === TRUE) {
        ChromePhp::log( "Table poles was created successfully");
        } else {
        ChromePhp::log("Error creating table: " . $db->error);
      }
    }

    function create_choices($db) {
      $create_choices = "CREATE TABLE IF NOT EXISTS choices (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      pole_id INT(6) UNSIGNED,
      description VARCHAR(30) NOT NULL,
      rank INT(6),
      reg_date TIMESTAMP,
      FOREIGN KEY (pole_id) REFERENCES poles(id)
      )";
      $result = mysqli_query($db,$create_choices);
      if ($result === TRUE) {
        ChromePhp::log( "Table choices was created successfully");
        } else {
        ChromePhp::log("Error creating table: " . $db->error);
      }
    }

    function insert_user($db,$email){
      //To check if the user already exists
      $id_query = "SELECT id FROM users
        WHERE email="."'".$email."'";
      $result = mysqli_query($db, $id_query);
      $id = mysqli_fetch_array($result)['id'];
      if($id === null){
        $insert_query = "INSERT INTO users (email)
          VALUES ('".$email."')";
        $result = mysqli_query($db,$insert_query);
        $last_id = mysqli_insert_id($db);
        if($result === TRUE){
          ChromePhp::log( "user was inserted to users");
        } else {
          ChromePhp::log("Error inserting user: " . $db->error);
        };
      }else{
        $last_id = $id;
      }
      return $last_id;
    }

    function insert_pole($db,$user_id,$vote_link,$result_link,$question){
      $pole_query = 'INSERT INTO poles(vote_link,result_link,user_id,question)
        VALUES ("'.$vote_link.'","'.$result_link.'","'.$user_id.'","'.$question.'")';
      $result = mysqli_query($db,$pole_query);
      $last_id = mysqli_insert_id($db);
      if($result === TRUE) {
        ChromePhp::log('pole inserted');
      }else{
        ChromePhp::log("Error inserting the pole". $db->error);
      }
      return $last_id;
    }

    function insert_choices($db,$pole_id,$choice){
      $choices_query = 'INSERT INTO choices(pole_id,description,rank)
        VALUES ("'.$pole_id.'","'.$choice.'",0)';
      $result = mysqli_query($db,$choices_query);
      if($result === TRUE) {
        ChromePhp::log('choice inserted');
      }else{
        ChromePhp::log("Error inserting the choice". $db->error);
      }
    }
  }
?>