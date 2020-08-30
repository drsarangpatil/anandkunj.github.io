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
			$query = ("SELECT Distinct p.full_name, p.at_post FROM ak_p_registration p, ak_st_payment r WHERE r.payment_status='Partial' and p.isstudent='Student'");
            try
            {
                $isCasepaper = filter_input(INPUT_GET, 'isCasepaper');
                if($isCasepaper==='1')
                    $query = $query . " and p.person_id  = r.person_id";
                    //$query = $query . " and c.person_id  = r.person_id";
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
            
			$query = ("SELECT person_id, dob, gender, mobile_no, photo, address, at_post, email, occupation FROM ak_p_registration WHERE full_name = '" . $full_name . "'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4] . '~~' . $record[5] . '~~' . $record[6] . '~~' . $record[7] . '~~' . $record[8];
				}
				echo $option;			// send data back to JS file
			}
		}
        
        if($process === "getCourse_admission_details")
		{
			$person_id=filter_input(INPUT_GET, 'person_id');
            
			//echo "6";
            
            $query = ("SELECT st_course_application_id, course_name, doa, doc, course_duration, ad_status, course_language, mother_tongue FROM ak_st_course_application WHERE person_id  = '" . $person_id ."'");
            
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
        
        if($process === "getAll_payment_records")
		{
			$st_course_application_id=filter_input(INPUT_GET, 'st_course_application_id');
            
			//echo "6";
            
            $query = "SELECT st_payment_id, payable_amount, st_payment_date, amount_paid, payment_mode, balance_amount, user_id FROM ak_st_payment";
            $query =  $query . " WHERE st_payment_id  = ";
            $query =  $query . " (SELECT max(st_payment_id) FROM ak_st_payment WHERE";
            $query =  $query . " st_course_application_id = " .$st_course_application_id ." and payment_status='Partial')";
            
           //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=st_payment_id align="center">' . $record[0] . '</td>';
                        $row= $row .'<td name=payable_amount align="center">' . $record[1] . '</td>';
                        $row= $row .'<td name=st_payment_date align="center">' . $record[2] . '</td>';
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
			$st_payment_id=filter_input(INPUT_GET, 'st_payment_id');
			//echo "6";
            
			$query = ("SELECT st_billing_id, balance_amount, pan_name, pan_number FROM ak_st_payment WHERE st_payment_id = '" . $st_payment_id. "'");
               
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
        
	}

?>