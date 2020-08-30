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
           $query= "UPDATE ak_room_number SET building_name='". $_POST["building_name"]."', room_number='". $_POST["room_number"]."', room_status='". $_POST["room_status"]."' WHERE room_number_id='". $_POST["room_number_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Room Number Edited')</script>";
			}
			else	
				echo "<script> alert('Room Number Not Edited')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}

	echo "<script> location.replace('../room_number_up.php'); </script>";

?>