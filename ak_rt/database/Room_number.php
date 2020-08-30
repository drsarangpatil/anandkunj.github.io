<?php
	//create connection
	include_once('Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
	//confirm connection
	if ($con)
	{
		mysqli_set_charset( $con, 'utf8' );
		
		//create query
		$query = "SELECT * FROM ak_room_number WHERE room_number= '" . $_POST["room_number"]. "'";
		//echo $query;
		
		//run query 
		$return = mysqli_query($con, $query);
		if(mysqli_num_rows($return)>0)
		{
			echo "<script> alert('Allready present')</script>";
		}   
		else
		{
			//create query
			$query="INSERT INTO ak_room_number (building_name, room_number, room_status) VALUES ('". $_POST["building_name"]."', '". $_POST["room_number"]."', '". $_POST["room_status"]."')";
			//echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Room Added')</script>";
			}
			else	
				echo "<script> alert('Room Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../room_number.php'); </script>";

?>