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
		
		if($process === "getNations")
		{
			//echo "4";
			$query = ("SELECT nation_id, nation_name FROM ak_nation");
			
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
		
			
		if($process === "getstates")
		{
			$nation=filter_input(INPUT_GET, 'nation');
			//echo "6";
			$query = ("SELECT state_id, state_name FROM ak_states WHERE nation_name = '" . $nation . "'");
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[1] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
		
		if($process === "getdistricts")
		{
			$nation=filter_input(INPUT_GET, 'nation');
			$state=filter_input(INPUT_GET, 'state');
			//echo "8";
			$query = ("SELECT district_id, district_name FROM ak_districts where nation_name = '" . $nation . "' AND state_name = '" . $state . "'");
			
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
		}
		
		if($process === "gettahsil")
		{
			$nation=filter_input(INPUT_GET, 'nation');
			$state=filter_input(INPUT_GET, 'state');
			$district=filter_input(INPUT_GET, 'district');
			//echo "10";
			$query = ("SELECT tahsil_id, tahsil_name FROM ak_tahsil where nation_name = '" . $nation . "' AND state_name = '" . $state . "'AND district_name = '" . $district . "'");
			
			//echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "11";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[1] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
     
	}

?>