<?php
  $db_host = 'localhost';
  $db_user = 'praba';
  $db_pwd = 'praba123';
  $db_name = 'feedback_app';

  $conn = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);

  if($conn -> connect_error){
    die('Connection failed!' . $conn->connect_error );
  }
?>
