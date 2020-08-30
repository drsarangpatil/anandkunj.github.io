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
		
		$option = '';             
        //echo "3";
		
		if($process === "getFullnames")
		{
			//echo "4";
			$query = ("SELECT full_name, at_post FROM ak_p_registration");
            
			
			//echo $query; 
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "5";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[0] .'-'. $record[1] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
        
        if($process === "getAll_details")
		{
			$full_name=filter_input(INPUT_GET, 'full_name');
            
			//echo "6";
            
			$query = ("SELECT person_id, dor, full_name,  gender, dob, pob, marital_status, male_child, female_child, occupation, occu_spl_fea, photo, address, at_post, pin_code, nation_name, state_name, district_name, tahsil_name, residence_phone, mobile_no, emergency_no, whatsapp_no, email, reference, isparticipant, ispatient, isstudent, isemployee, issubscriber, ismember, isdonner FROM ak_p_registration WHERE full_name = '" . $full_name . "'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4] . '~~' . $record[5] . '~~' . $record[6] . '~~' . $record[7] . '~~' . $record[8] . '~~' . $record[9] . '~~' . $record[10] . '~~' . $record[11] . '~~' . $record[12] . '~~' . $record[13] . '~~' . $record[14] . '~~' . $record[15] . '~~' . $record[16] . '~~' . $record[17] . '~~' . $record[18] . '~~' . $record[19] . '~~' . $record[20] . '~~' . $record[21] . '~~' . $record[22] . '~~' . $record[23] . '~~' . $record[24] . '~~' . $record[25] . '~~' . $record[26] . '~~' . $record[27] . '~~' . $record[28] . '~~' . $record[29] . '~~' . $record[30] . '~~' . $record[31];
				}
				echo $option;			// send data back to JS file
			}
		}
          
	}

?>