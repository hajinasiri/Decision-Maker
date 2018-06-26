<?
  class Tables {

    function __construct() {
    }

    function create_users($db) { // this is the hello() function
      $create_users = "CREATE TABLE IF NOT EXISTS users(
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      email VARCHAR(30)
      )";
      if ($db->query($create_users) === TRUE) {
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
      reg_date TIMESTAMP,
      FOREIGN KEY (user_id) REFERENCES users(id)
      )";
      if ($db->query($create_poles) === TRUE) {
        ChromePhp::log( "Table poles was created successfully");
        } else {
        ChromePhp::log("Error creating table: " . $db->error);
      }
    }

    function create_choices($db) {
      $create_choices = "CREATE TABLE IF NOT EXISTS choices (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      pole_id INT(6),
      description VARCHAR(30) NOT NULL,
      rank INT(6),
      reg_date TIMESTAMP,
      FOREIGN KEY (pole_id) REFERENCES poles(id)
      )";
      if ($db->query($create_choices) === TRUE) {
        ChromePhp::log( "Table choices was created successfully");
        } else {
        ChromePhp::log("Error creating table: " . $db->error);
      }
    }
  }
?>