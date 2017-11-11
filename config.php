<?php

	// configurasi database
  define('HOST','');
  define('USER','');
  define('PASS','');
  define('DB','dbcrud_dekstop');
  
  
  $conn = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

  // set default time zone
  date_default_timezone_set("Asia/Jakarta");
?>