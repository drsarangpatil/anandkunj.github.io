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
		
        if($process === "getOp_sms_tempalte_records")
		{
			$query = ("SELECT op_sms_id, op_sms_name, op_sms_template FROM ak_op_sms_template WHERE 1");
            
           //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=op_sms_id align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=op_sms_name align="left">' . $record[1] . '</td>';
                        $row= $row .'<td name=op_sms_template align="left">' . $record[2] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			 }
		  }
        
        if($process === "getSelected_sms_data")
		{
			$op_sms_id=filter_input(INPUT_GET, 'op_sms_id');
            
			//echo "6";
            
			$query = ("SELECT op_sms_name, op_sms_template FROM ak_op_sms_template WHERE op_sms_id = '" . $op_sms_id . "'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1];
				}
				echo $option;			// send data back to JS file
			}
		}
        
	}

?>