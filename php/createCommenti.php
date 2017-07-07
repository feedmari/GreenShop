<?php
include 'connection.php';
$conn = connect();
$sql= "CREATE TABLE Commenti (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    messaggio VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP,
    seen INT(1)
  )";

  if ($conn->query($sql) === TRUE) {
    echo "Table MyGuests created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

  close($conn);
 ?>
