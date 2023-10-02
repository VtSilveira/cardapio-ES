<?php
include 'banco.php';

function fetchPratos() {
  $conn = conectaBD();
  $sql = 'SELECT * FROM pratos';

  $result = mysqli_query($conn, $sql);

  echo $result;
}
