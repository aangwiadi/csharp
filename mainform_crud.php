<?php
	require_once('config.php');
    
    $NoID = $_GET['NoID'];
    $Mode = $_GET['Mode'];
    
    if ($Mode =='EDIT' || $Mode =='NEW')
   {    $Name = $_GET['Name'];
        $Address = $_GET['Address'];
        $Update = $_GET['Update'];
   }
    $TotalData = 0;
    $results = array();


   if ($Mode == 'NEW')
   {

     $stmt = $conn->prepare("SELECT COUNT(*) AS Total from tb_user WHERE NoID=? ");
    $stmt->bind_param("s", $NoID);
    $stmt->execute();
    $stmt->bind_result( $TotalData);     
    $stmt->fetch();
    $stmt->close(); 

     if ($TotalData > 0)
     {
       
             $results[] = array(
            'Code' => '200',
            'Message' => 'ID Sudah digunakan!');

             $json = json_encode($results);
             echo $json;

				return;
     }
     else
     {
          $stmt = $conn->prepare("INSERT INTO tb_user (`NoID`, `Name`, `Address`, `Update`) VALUES (?, ?, ?,?)");
          $stmt->bind_param("ssss", $NoID, $Name, $Address, $Update);
          $stmt->execute();
          $stmt->close();

           $results[] = array(
            	'Code'	=>"100",
				    	'Message'=> "Menambahkan data berhasil!");

             $json = json_encode($results);
             echo $json;
				return;
          
     }

   }


   if ($Mode == 'EDIT')
   {
          $stmt = $conn->prepare("UPDATE  tb_user SET `Name` =?, `Address` =?, `Update` =? WHERE `NoID` = ?");
          $stmt->bind_param("ssss", $Name, $Address, $Update, $NoID);
          $stmt->execute();
          $stmt->close();

               $results[] = array(
            	'Code'	=>"100",
				    	'Message'=> "Update data berhasil!");

             $json = json_encode($results);
             echo $json;
				return;
   }

   if ($Mode == 'DELETE')
   {
          $stmt = $conn->prepare("DELETE FROM  tb_user WHERE `NoID` = ?");
          $stmt->bind_param("s",$NoID);
          $stmt->execute();
          $stmt->close();

              $results[] = array(
            	'Code'	=>"100",
				    	'Message'=> "Hapus data berhasil!");

             $json = json_encode($results);
             echo $json;
             return;
   }

?>