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
			$query = ("SELECT Distinct full_name, at_post FROM ak_p_registration p, ak_mb_membership_form s WHERE p.ismember='Member'  and s.mem_status='Activate'");
            try
            {
                $isCasepaper = filter_input(INPUT_GET, 'isCasepaper');
                if($isCasepaper==='1')
                    $query = $query . " and p.person_id  = s.person_id";
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
            
			$query = ("SELECT person_id, dob, gender, mobile_no, photo, address, at_post, pin_code, district_name, state_name, occupation, occu_spl_fea, emergency_no, email FROM ak_p_registration WHERE full_name = '" . $full_name . "'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4] . '~~' . $record[5] . '~~' . $record[6] . '~~' . $record[7] . '~~' . $record[8] . '~~' . $record[9] . '~~' . $record[10] . '~~' . $record[11] . '~~' . $record[12] . '~~' . $record[13];
				}
				echo $option;			// send data back to JS file
			}
		}
        
        if($process === "getAll_membership_records")
		{
			$person_id=filter_input(INPUT_GET, 'person_id');
            
			//echo "6";
            
            $query = ("SELECT mb_membership_id, association_name, membership_type,	dos, doc, user_id FROM ak_mb_membership_form WHERE person_id  = '" . $person_id ."' and mem_status='Activate'");
            
           //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=mb_membership_id align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=association_name align="left">' . $record[1] . '</td>';
                        $row= $row .'<td name=membership_type align="left">' . $record[2] . '</td>';
                        $row= $row .'<td name=dos align="left">' . $record[3] . '</td>';
                        $row= $row .'<td name=doc align="left">' . $record[4] . '</td>';
                        $row= $row .'<td name=user_id align="left">' . $record[5] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			}
		}
        
        if($process === "getSelected_membership_data")
		{
			$mb_membership_id=filter_input(INPUT_GET, 'mb_membership_id');
            
			//echo "6";
            
			$query = ("SELECT association_name, membership_type, membership_amount, mem_status, dos, doc, membership_duration, commune FROM ak_mb_membership_form WHERE mb_membership_id= '" . $mb_membership_id . "' and mem_status='Activate'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4] . '~~' . $record[5] . '~~' . $record[6] . '~~' . $record[7];
				}
				echo $option;			// send data back to JS file
			}
		}
        
         if($process === "getAll_deactivated_membership_records")
        {
			//echo "6";
            
             $query= ("SELECT Distinct p.full_name, s.mb_membership_id, s.dos, s.doc, s.mem_status, p.address, p.at_post, p.mobile_no,  s.association_name, s.membership_type FROM ak_p_registration p, ak_mb_membership_form s WHERE 1 and mem_status='Deactivate'");
            $query = $query . " and p.person_id  = s.person_id";
            
           //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=mb_membership_id align="left">' . $record[1] . '</td>';
                        $row= $row .'<td name=full_name align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=dos align="left">' . $record[2] . '</td>';
                        $row= $row .'<td name=doc align="left">' . $record[3] . '</td>';
                        $row= $row .'<td name=mem_status align="left">' . $record[4] . '</td>';
                        $row= $row .'<td name=address align="left">' . $record[5] . '</td>';
                        $row= $row .'<td name=at_post align="left">' . $record[6] . '</td>';
                        $row= $row .'<td name=mobile_no align="left">' . $record[7] . '</td>';
                        $row= $row .'<td name=association_name align="left">' . $record[8] . '</td>';
                        $row= $row .'<td name=membership_type align="left">' . $record[9] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			}
        }
		
        
        
	}

?>