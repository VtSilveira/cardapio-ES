<?php

function conectaBD() {
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "restaurante";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    $conn = null;
  }

  return $conn;
}

function fechaBD($conn) {
  mysqli_close($conn);
}
