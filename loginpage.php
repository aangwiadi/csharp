<?php

// add config database
require_once('config.php');
  
    $UserID = $_GET['UserID'];
    $Password = $_GET['Password'];

    $TotalData = 0;
    $results = array();

    $stmt = $conn->prepare("SELECT COUNT(*) AS Total from tb_login WHERE UserID=? AND Password =?");
    $stmt->bind_param("ss", $UserID, $Password);
    $stmt->execute();
    $stmt->bind_result( $TotalData);     
    $stmt->fetch();
    $stmt->close();

	// count data
    if ($TotalData > 0)
     {
       
             $results[] = array(
            'Code' => '100',
            'Message' => 'Login Sukses!');

             $json = json_encode($results);
             echo $json;
             return;
     }
     else
     {
            $results[] = array(
            'Code' => '200',
            'Message' => 'Login Gagal!');

             $json = json_encode($results);
             echo $json;
             return;
     }




?>