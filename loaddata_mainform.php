<?php
	// add config database
	require_once('config.php');
    
        $query = mysqli_query($conn, "SELECT * FROM tb_user ");
        $results = array();
       while($row = mysqli_fetch_array($query))
        {
        $results[] = array(
            'NoID' => $row['NoID'],
            'Name' => $row['Name'],
            'Address' => $row['Address'],
            'Update' => $row['Update']
        );
        }
		
		//json 
      $json = json_encode($results);

  echo $json;

?>