<?php
  define('HOST','localhost');
  define('USER','aangwiadi');
  define('PASS','123456789');
  define('DB','dbcrud_dekstop');
  $conn = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

  date_default_timezone_set("Asia/Jakarta");
?>