<?php
	//create connection
	include_once('Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
        
		
	//confirm connection
	if ($con)
	{
		mysqli_set_charset( $con, 'utf8' );
		
		{
			//create query
           $query= "UPDATE ak_building_name SET building_name='". $_POST["building_name"]."' WHERE building_name_id='". $_POST["building_name_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Building Name Edited')</script>";
			}
			else	
				echo "<script> alert('Building Name Not Edited')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../building_name_up.php'); </script>";

?>