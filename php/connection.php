<?php
  function connect(){
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "my_greenshop";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    };

    return $conn;
  };

  function close($connection){
    $connection->close();
  };

?>
