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
		
        if($process === "getSb_subscription_type_records")
		{
			//$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
            $query = ("SELECT sb_subscription_type_id, magazine_name, subscription_type, subscription_amount FROM ak_sb_subscription_type WHERE 1");
            
           //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=sb_subscription_type_id align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=magazine_name align="left">' . $record[1] . '</td>';
                        $row= $row .'<td name=subscription_type align="left">' . $record[2] . '</td>';
                        $row= $row .'<td name=subscription_amount align="left">' . $record[3] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			 }
		  }
        
        if($process === "getSelected_subscription_type_data")
		{
			$sb_subscription_type_id=filter_input(INPUT_GET, 'sb_subscription_type_id');
            
			//echo "6";
            
			$query = ("SELECT magazine_name, subscription_type, subscription_amount FROM ak_sb_subscription_type WHERE sb_subscription_type_id = '" . $sb_subscription_type_id . "'");
			
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