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
        
         if($process === "getRt_room_allocation_records")
		{
			//$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
            $query = ("SELECT Distinct p.full_name, r.rt_room_allocation_id, r.building_name, r.room_number, r.room_status, r.bed_number, r.doa, r.doc, r.retreat_duration, r.attendant_name1, r.bed_number1, r.attendant_name2, r.bed_number2, p.person_id FROM ak_p_registration p, ak_rt_room_allocation r, ak_rt_case_sheet c WHERE c.ad_status='Admitted'");
            $query = $query . " and p.person_id  = c.person_id";
            $query = $query . " and c.rt_case_sheet_id  = r.rt_case_sheet_id";
            
           //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        
                        $row= $row .'<td name=rt_room_allocation_id align="left">' . $record[1] . '</td>';
                        $row= $row .'<td name=building_name align="left">' . $record[2] . '</td>';
                        $row= $row .'<td name=room_number align="left">' . $record[3] . '</td>';
                        $row= $row .'<td name=room_status align="left">' . $record[4] . '</td>';
                        $row= $row .'<td name=full_name align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=bed_number align="left">' . $record[5] . '</td>';
                        $row= $row .'<td name=doa align="left">' . $record[6] . '</td>';
                        $row= $row .'<td name=doc align="left">' . $record[7] . '</td>';
                        $row= $row .'<td name=retreat_duration align="left">' . $record[8] . '</td>';
                        $row= $row .'<td name=attendant_name1 align="left">' . $record[9] . '</td>';
                        $row= $row .'<td name=bed_number1 align="left">' . $record[10] . '</td>';
                        $row= $row .'<td name=attendant_name2 align="left">' . $record[11] . '</td>';
                        $row= $row .'<td name=bed_number2 align="left">' . $record[12] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			 }
		  }
        
        
		if($process === "getFullnames")
		{
			//echo "4";
			$query = ("SELECT Distinct p.full_name, p.at_post FROM ak_p_registration p, ak_rt_case_sheet c, ak_rt_attendant_info d WHERE c.ad_status='Admitted' and p.isparticipant='Participant'");
            try
            {
                $isPrescription = filter_input(INPUT_GET, 'isPrescription');
                if($isPrescription==='1')
                    $query = $query . " and p.person_id  = c.person_id";
                    $query = $query . " and c.person_id  = d.person_id";
            }
            catch(Exception $e){}
			
			echo $query;  
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
        
       
        
        if($process === "getSelected_rt_attendant_info_record")
		{
			//$rt_room_allocation_id=filter_input(INPUT_GET, 'rt_room_allocation_id'); 
            $rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
            
			//echo "6";
            
			$query = ("SELECT no_attendant, attendant_name1, attendant_name2 FROM ak_rt_attendant_info WHERE rt_case_sheet_id = '" . $rt_case_sheet_id ."'");
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2];
				}
				echo $option;			// send data back to JS file
			}
		}
        
	}

?>