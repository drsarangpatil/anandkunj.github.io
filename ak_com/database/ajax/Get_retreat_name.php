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
		
		$option = '';             /*<option></option>*/
		//echo "3";
		
		if($process === "getRetreat_name")
		{
			//echo "4";
			$query = ("SELECT retreat_name FROM ak_retreat_name");
            
            // word distinct is used to avoid repeatation of at_post ie place in the given field.
			
			//echo $query; 
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "5";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[0] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
		
	}

?>