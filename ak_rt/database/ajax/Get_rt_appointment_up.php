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
        
         if($process === "getAll_rt_appointment_records")
		{
			//$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
            $query = ("SELECT rt_ap_id, ar_date, ar_time, st_days, full_name, at_post, mobile_no, tr_mode, ad_type, rm_expected, ad_purpose  FROM ak_rt_appointment WHERE ad_status='Pending'");
            
           //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=rt_ap_id align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=ar_date align="left">' . $record[1] . '</td>';
                        $row= $row .'<td name=ar_time align="left">' . $record[2] . '</td>';
                        $row= $row .'<td name=st_days align="left">' . $record[3] . '</td>';
                        $row= $row .'<td name=full_name align="left">' . $record[4] . '</td>';
                        $row= $row .'<td name=at_post align="left">' . $record[5] . '</td>';
                        $row= $row .'<td name=mobile_no align="left">' . $record[6] . '</td>';
                        $row= $row .'<td name=tr_mode align="left">' . $record[7] . '</td>';
                        $row= $row .'<td name=ad_type align="left">' . $record[8] . '</td>';
                        $row= $row .'<td name=rm_expected align="left">' . $record[9] . '</td>';
                        $row= $row .'<td name=ad_purpose align="left">' . $record[10] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			 }
		  }
        
        
        if($process === "getSelected_Rt_appointment_record")
		{
			$rt_ap_id=filter_input(INPUT_GET, 'rt_ap_id'); 
            
			//echo "6";
            
			$query = ("SELECT ar_date, ar_session, ar_time, st_days, tr_mode, ad_type, rm_expected, ad_purpose, ad_status, full_name, age, gender, at_post, mobile_no, email FROM ak_rt_appointment WHERE rt_ap_id = '" . $rt_ap_id ."'");
			
            
            
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4] . '~~' . $record[5] . '~~' . $record[6] . '~~' . $record[7] . '~~' . $record[8]. '~~' . $record[9]. '~~' . $record[10]. '~~' . $record[11] . '~~' . $record[12] . '~~' . $record[13] . '~~' . $record[14];
				}
				echo $option;			// send data back to JS file
			}
		}
        
	}

?>