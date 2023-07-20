<?php
$conn = new mysqli("localhost","root","","skripsi");

// Check connection

if ($conn -> connect_error) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

?>