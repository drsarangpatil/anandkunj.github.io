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
		
		$option = '<option></option>';        
		//echo "3";
		
        if($process === "getTherapy_dept")
		{
			//echo "4";
			$query = ("SELECT therapy_dept FROM ak_therapy_dept");
			
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
        
        
		if($process === "getTreatment_name")
		{
            $therapy_dept=filter_input(INPUT_GET, 'therapy_dept');
			//echo "4";
			$query = ("SELECT treatment_name FROM ak_treatment_name WHERE therapy_dept = '" . $therapy_dept . "'");
			
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
        
        
        
        if($process === "getTreatment_time")
		{
			//echo "4";
			$query = ("SELECT treatment_time FROM ak_treatment_time");
			
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
        
        if($process === "getTherapist_name")
		{
			//echo "4";
			$query = ("SELECT staff_short_name FROM ak_staff_other_info WHERE role='Therapist' and staff_status='Active'");
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