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
			$query = ("SELECT full_name, gender FROM ak_direct_visit");
            
			
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
			$full_name=filter_input(INPUT_GET, 'full_name');
            
			//echo "6";
            
			$query = ("SELECT direct_visit_id, prescription_date, schedule,  user_id, full_name, age, gender, mobile_no, complaints, weight, bp, oe, final_diagnosis FROM ak_direct_visit WHERE full_name = '" . $full_name . "'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4] . '~~' . $record[5] . '~~' . $record[6] . '~~' . $record[7] . '~~' . $record[8] . '~~' . $record[9] . '~~' . $record[10] . '~~' . $record[11] . '~~' . $record[12] ;
				}
				echo $option;			// send data back to JS file
			}
		}
        
         if($process === "getSelected_medicine_prescription_data")
		{
			$direct_visit_id=filter_input(INPUT_GET, 'direct_visit_id');
			//echo "6";
            
			$query = ("SELECT disease_name, medicine_names, dosage, quantity FROM ak_dir_medicine_prescription WHERE direct_visit_id = '" . $direct_visit_id. "'");
            
            //echo $query;
			
             $response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
               
                $option="";
				while($record = mysqli_fetch_array($response)) 
				{
                   
					$option  = $option . $record[0] . "~~". $record[1] . "~~". $record[2] . "~~". $record[3] . "\n";
                    
				}
                $option=substr($option,0,strlen($option)-1);
                
				echo $option;			// send data back to JS file
			}
		}
          
	}

?>