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
			$query = ("SELECT full_name, at_post FROM ak_p_registration WHERE person_category='Employee'");
            
			
			//echo $query; 
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "5";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $option . '<option>' . $record[0].'-'.$record[1] . '</option>';
				}
				echo $option;			// send data back to JS file
			}
		}
        
        if($process === "getOther_details")
		{
			$full_name=filter_input(INPUT_GET, 'full_name');
            
			//echo "6";
            
			$query = ("SELECT person_id, dob, gender, mobile_no, photo FROM ak_p_registration WHERE full_name = '" . $full_name . "'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4];
				}
				echo $option;			// send data back to JS file
			}
		}
                        
         if($process === "getStaff_other_info_details")
		{
			
             $person_id=filter_input(INPUT_GET, 'person_id');
            
			//echo "6";
            
			$query = ("SELECT user_id, other_info_date, staff_other_info_id, staff_short_name, mother_tongue, religion, guardian_name, guardian_relation, guardian_mobile_no, adhar_no, pan_no, referred_by, referrer_m_no, past_work_exp, qualifcation1, institute1, grade1, qualifcation2, institute2, grade2, doj, name_of_dept, designation, role, specialization, working_type, bank_name, ifsc_code, account_no FROM ak_staff_other_info WHERE person_id = '" . $person_id ."'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4] . '~~' . $record[5] . '~~' . $record[6] . '~~' . $record[7] . '~~' . $record[8] . '~~' . $record[9] . '~~' . $record[10] . '~~' . $record[11] . '~~' . $record[12] . '~~' . $record[13] . '~~' . $record[14] . '~~' . $record[15] . '~~' . $record[16] . '~~' . $record[17] . '~~' . $record[18] . '~~' . $record[19] . '~~' . $record[20] . '~~' . $record[21] . '~~' . $record[22] . '~~' . $record[23] . '~~' . $record[24] . '~~' . $record[25] . '~~' . $record[26] . '~~' . $record[27] . '~~' . $record[28];
				}
				echo $option;			// send data back to JS file
			}
		}
        
	}

?>