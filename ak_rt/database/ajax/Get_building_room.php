<?php
	//create connection
	include_once('../Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
	//confirm connection
	if ($con)
	{
		//echo "1";
		mysqli_set_charset( $con, 'utf8' );
		
		//create process
		$process = filter_input(INPUT_GET, 'process');
		//echo "2 : " . $process;
		
		$option = '<option ></option>';     
        //echo "3";
		
		if($process === "getBuilding_names")
		{
			//echo "4";
			$query = ("SELECT building_name_id, building_name FROM ak_building_name");
			
			//echo $query; 
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "5";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[1] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
			
		if($process === "getVacantRoom_numbers")
		{
			$building_name=filter_input(INPUT_GET, 'building_name');
			//echo "9";
			$query = ("SELECT room_number_id, room_number FROM ak_room_number WHERE room_status='Vacant' and building_name= '" . $building_name . "'");
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "10";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[1] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
        
        if($process === "getAllRoom_numbers")
		{
			$building_name=filter_input(INPUT_GET, 'building_name');
			//echo "9";
			$query = ("SELECT room_number_id, room_number FROM ak_room_number WHERE building_name= '" . $building_name . "'");
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "10";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[1] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
         
       /* if($process === "getBed_numbers")
		{
			$building_name=filter_input(INPUT_GET, 'building_name');
			$room_number=filter_input(INPUT_GET, 'room_number');
			//echo "8";
			$query = ("SELECT bed_number_id, bed_number FROM ak_bed_number where building_name = '" . $building_name . "' AND room_number = '" . $room_number . "'");
			
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "9";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[1] . '</option>';
				}
 				echo $option;			// send data back to JS file
			}
		}*/
        
	}

?>