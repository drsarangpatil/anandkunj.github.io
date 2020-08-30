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
        
        if($process === "getAll_payment_records")
		{
			$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
			//echo "6";
            
            $query = ("SELECT rt_payment_id, payable_amount, rt_payment_date, amount_paid, payment_mode, balance_amount, user_id FROM ak_rt_payment WHERE rt_case_sheet_id = '" . $rt_case_sheet_id ."'");
            
           //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=rt_payment_id align="center">' . $record[0] . '</td>';
                        $row= $row .'<td name=payable_amount align="center">' . $record[1] . '</td>';
                        $row= $row .'<td name=rt_payment_date align="center">' . $record[2] . '</td>';
                        $row= $row .'<td name=amount_paid align="center">' . $record[3] . '</td>';
                        $row= $row .'<td name=payment_mode align="center">' . $record[4] . '</td>';
                        $row= $row .'<td name=balance_amount align="center">' . $record[5] . '</td>';
                        $row= $row .'<td name=user_id align="center">' . $record[6] . '</td>';
                        
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			}
		}
        
        if($process === "getSelected_payment_data")
		{
			$rt_payment_id=filter_input(INPUT_GET, 'rt_payment_id');
			//echo "6";
            
			$query = ("SELECT rt_payment_date, schedule, rt_estimation_id, payable_amount, amount_paid, balance_amount, payment_mode, payment_details, payment_status, pan_name, pan_number FROM ak_rt_payment WHERE rt_payment_id = '" . $rt_payment_id. "'");
               
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4] . '~~' . $record[5] . '~~' . $record[6] . '~~' . $record[7] . '~~' . $record[8] . '~~' . $record[9] . '~~' . $record[10];
				}
				echo $option;			// send data back to JS file
                        
			}
		}
        
	}

?>