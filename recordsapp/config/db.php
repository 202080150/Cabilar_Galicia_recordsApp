<?php
require_once 'config.php';

$conn = mysqli_connect(DB_HOST, DB_PASS, DB_USER, DB_NAME);

if(mysqli_connect_errno()) {
  echo 'Failed to connect to MySQL'. mysqli_connect_errno();
}


?>