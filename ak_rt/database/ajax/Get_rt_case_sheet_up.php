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
			$query = ("SELECT Distinct p.full_name, p.at_post FROM ak_p_registration p, ak_rt_case_sheet c WHERE c.ad_status='Admitted' and p.isparticipant='Participant'");
            try
            {
                $isCasepaper = filter_input(INPUT_GET, 'isCasepaper');
                if($isCasepaper==='1')
                    $query = $query . " and p.person_id  = c.person_id";
            }
            catch(Exception $e){}
			
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
        
        if($process === "getAll_case_sheet_records")
		{
			$person_id=filter_input(INPUT_GET, 'person_id');
            
			//echo "6";
            
            $query = ("SELECT rt_case_sheet_id, retreat_name, doa, doc, retreat_duration, ad_status, user_id FROM ak_rt_case_sheet WHERE ad_status='Admitted' and person_id  = '" . $person_id ."'");
            
           echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=rt_case_sheet_id align="center">' . $record[0] . '</td>';
                        $row= $row .'<td name=retreat_name align="center">' . $record[1] . '</td>';
                        $row= $row .'<td name=doa align="center">' . $record[2] . '</td>';
                        $row= $row .'<td name=doc align="center">' . $record[3] . '</td>';
                        $row= $row .'<td name=retreat_duration align="center">' . $record[4] . '</td>';
                        $row= $row .'<td name=ad_status align="center">' . $record[5] . '</td>';
                        $row= $row .'<td name=user_id align="center">' . $record[6] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			}
		}
        
        if($process === "getSelected_case_sheet_data")
		{
			$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            $person_id=filter_input(INPUT_GET, 'person_id');
            
			//echo "6";
            
			$query = ("SELECT doa, retreat_name, retreat_duration, doc, present_complaints, past_history, treatment_history, family_history, appetite, bowel_motions, urination, sleep, food_habits, addictions, work_type, stress_type, clinical_examination, weight, height, bmi, investigations, ad_status FROM ak_rt_case_sheet WHERE rt_case_sheet_id = '" . $rt_case_sheet_id . "' and person_id = '" . $person_id ."'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4] . '~~' . $record[5] . '~~' . $record[6] . '~~' . $record[7] . '~~' . $record[8] . '~~' . $record[9] . '~~' . $record[10] . '~~' . $record[11] . '~~' . $record[12] . '~~' . $record[13] . '~~' . $record[14] . '~~' . $record[15] . '~~' . $record[16] . '~~' . $record[17] . '~~' . $record[18] . '~~' . $record[19] . '~~' . $record[20] . '~~' . $record[21];
				}
				echo $option;			// send data back to JS file
			}
		}
        
         if($process === "getSelected_case_sheet_fd_data")
		{
			$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
			//echo "6";
            
			$query = ("SELECT disease_name, disease_nick FROM ak_rt_case_sheet_fd WHERE rt_case_sheet_id = '" . $rt_case_sheet_id . "'");
            
               //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				$option="";
                
				while($record = mysqli_fetch_array($response)) 
				{
                   
					$option  = $option . $record[0] . "~~". $record[1] ."\n";
                    
				}
                
                $option=substr($option,0,strlen($option)-1);
                
				echo $option;			// send data back to JS file
			}
		}
        
	}

?>