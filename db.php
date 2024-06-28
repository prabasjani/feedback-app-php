<?php
  define('HOST', 'localhost');
  define('USER', 'root');
  define('PWD', '');
  define('DB_NAME', 'feedback_app');

  $conn = new mysqli(HOST, USER, PWD,DB_NAME);
  echo $conn;
  if(!$conn -> connect_error){
    die('Connection failed!' . $conn->connect_error );
  }
  echo 'Connected!'
?>
