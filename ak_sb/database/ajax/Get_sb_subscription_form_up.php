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
			$query = ("SELECT Distinct p.full_name, p.at_post FROM ak_p_registration p, ak_sb_subscription_form s WHERE p.issubscriber='Subscriber' and s.pay_status='Pending'");
            
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
        
        if($process === "getAll_subscription_records")
		{
			$person_id=filter_input(INPUT_GET, 'person_id');
            
			//echo "6";
            
            $query = ("SELECT sb_subscription_id, magazine_name, subscription_type,	dos, doc, user_id FROM ak_sb_subscription_form WHERE person_id  = '" . $person_id ."' and pay_status='Pending'");
            
           //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=sb_subscription_id align="center">' . $record[0] . '</td>';
                        $row= $row .'<td name=magazine_name align="center">' . $record[1] . '</td>';
                        $row= $row .'<td name=subscription_type align="center">' . $record[2] . '</td>';
                        $row= $row .'<td name=dos align="center">' . $record[3] . '</td>';
                        $row= $row .'<td name=doc align="center">' . $record[4] . '</td>';
                        $row= $row .'<td name=user_id align="center">' . $record[5] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			}
		}
        
        if($process === "getSelected_subscription_data")
		{
			$sb_subscription_id=filter_input(INPUT_GET, 'sb_subscription_id');
            
			//echo "6";
            
			$query = ("SELECT magazine_name, subscription_type, subscription_amount, sub_status, dos, doc, subscription_duration, postage FROM ak_sb_subscription_form WHERE sb_subscription_id= '" . $sb_subscription_id . "' and pay_status='Pending'");
			
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
        
	}

?>