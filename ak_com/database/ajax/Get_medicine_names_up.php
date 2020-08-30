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
		
        if($process === "getMedicine_name_records")
		{
			//$medicine_names_id=filter_input(INPUT_GET, 'medicine_names_id');
            
            $query = ("SELECT medicine_names_id, disease_category, medicine_names FROM ak_medicine_names WHERE 1");
            
           //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=medicine_names_id align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=disease_category align="left">' . $record[1] . '</td>';
                        $row= $row .'<td name=medicine_names align="left">' . nl2br($record[2]) . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			 }
		  }
        
        if($process === "getSelected_medicine_name_data")
		{
			$medicine_names_id=filter_input(INPUT_GET, 'medicine_names_id');
            
			//echo "6";
            
			$query = ("SELECT disease_category, medicine_names FROM ak_medicine_names WHERE medicine_names_id = '" . $medicine_names_id . "'");
			
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