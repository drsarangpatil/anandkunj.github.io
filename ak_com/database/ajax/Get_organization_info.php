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
		
		if($process === "getMainnames")
		{
			//echo "4";
			$query = ("SELECT main_name, at_post FROM ak_organization_info");
            
			
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
			$main_name=filter_input(INPUT_GET, 'main_name');
            
			//echo "6";
            
			$query = ("SELECT org_id, doo, main_name, org_slogan, parent_org, other_title, logo, address, at_post, pin_code, residence_phone1, residence_phone2, mobile_no, whatsapp_no, email, website, bank_name, ifsc_code, account_no, reg_autho, doi, org_reg_no, gst_reg_no, user_id FROM ak_organization_info WHERE main_name = '" . $main_name . "'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4] . '~~' . $record[5] . '~~' . $record[6] . '~~' . $record[7] . '~~' . $record[8] . '~~' . $record[9] . '~~' . $record[10] . '~~' . $record[11] . '~~' . $record[12] . '~~' . $record[13] . '~~' . $record[14] . '~~' . $record[15] . '~~' . $record[16] . '~~' . $record[17] . '~~' . $record[18] . '~~' . $record[19] . '~~' . $record[20] . '~~' . $record[21] . '~~' . $record[22] . '~~' . $record[23];
				}
				echo $option;			// send data back to JS file
			}
		}
          
	}

?>