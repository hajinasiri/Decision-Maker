<?
  class Tables {

    function __construct() {
    }

    function connect() {
      //Setting parameters for connecting to the database
      $user = 'root';
      $pass = '';
      $db_name = 'test';
      //connecting to the database
      $db = new mysqli('localhost', $user, $pass, $db_name) or die("unable to connect to database test");
      return $db;
    }

    // creating tables functions
    function create_users($db) {
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

    //Inserting data functions

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


    //Getting data functions

    function get_pole_by_vote_link($db,$vote_link) {
      $pole_query = "SELECT id, question, result_link FROM poles
        WHERE vote_link="."'".$vote_link."'";
      $result = mysqli_query($db, $pole_query);
      $info= mysqli_fetch_array($result);
      return $info;
    }

    function get_pole_by_result_link($db,$result_link) {
      $pole_query = "SELECT id, question FROM poles
        WHERE result_link="."'".$result_link."'";
      $result = mysqli_query($db, $pole_query);
      $info= mysqli_fetch_array($result);
      return $info;
    }

    function get_choices_by_pole_id($db,$pole_id) {
      $choice_query = "SELECT * FROM choices
        WHERE pole_id="."'".$pole_id."'";
      $result = mysqli_query($db, $choice_query);
      // $info= mysqli_fetch_array($result);
      $choices = array();
      $id = array();
      $ranks = array();
      while ($row = mysqli_fetch_array($result)) {
        $id[] = $row['id'];
        $choices[] = $row['description'];
        $ranks[] = $row['rank'];
      }
      return array($choices,$ranks,$id);
    }

    //Updating data function
    function update_choice($db,$id,$rank){
      $choice_query = "UPDATE choices
        SET rank = ".$rank."
        WHERE id =".$id;
      mysqli_query($db, $choice_query);
    }
  }
?>