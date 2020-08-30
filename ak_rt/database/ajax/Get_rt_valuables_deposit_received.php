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
             
        if($process === "getFinal_diagnosis")
		{
            $person_id=filter_input(INPUT_GET, 'person_id');
			//echo "6";
            
            $query = "SELECT rt_case_sheet_id, disease_name, disease_nick FROM ak_rt_case_sheet_fd";
            $query =  $query . " WHERE rt_case_sheet_id  = ";
            $query =  $query . " (SELECT max(rt_case_sheet_id) FROM ak_rt_case_sheet WHERE";
            $query =  $query . " person_id = " .$person_id .")";
			
            //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                $cnt =1;
                $option="";
				while($record = mysqli_fetch_array($response)) 
				{
                    if($cnt==1)
                       $option =  $record[0] ."~~";
                    $cnt++;
					$option  = $option . $record[1] . ' ('. $record[2] .'), ';
                    
				}
                $option=str_replace("\n","",$option);
                $option=str_replace("\r","",$option);
                $option=substr( $option,0,strlen($option)-2);
				echo $option;			// send data back to JS file
			}
		}
        
        if($process === "getRetreat_details")
		{
			$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
			//echo "6";
            
            $query = ("SELECT doa, retreat_name, retreat_duration, doc FROM ak_rt_case_sheet WHERE rt_case_sheet_id = '" . $rt_case_sheet_id ."'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3];
				}
				echo $option;			// send data back to JS file
			}
		}

        if($process === "getRoom_details")
		{
			$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
			//echo "6";
            
            $query = ("SELECT room_number FROM ak_rt_room_allocation WHERE rt_case_sheet_id = '" . $rt_case_sheet_id ."'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0];
				}
				echo $option;			// send data back to JS file
			}
		}
        
        if($process === "getRt_attendant_info_details")
		{
			$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
			//echo "6";
            
            $query = ("SELECT no_attendant FROM  ak_rt_attendant_info WHERE rt_case_sheet_id = '" . $rt_case_sheet_id ."'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0];
				}
				echo $option;			// send data back to JS file
			}
		}
        
	}

?>