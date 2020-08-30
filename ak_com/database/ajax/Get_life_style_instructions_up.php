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
		
        if($process === "getlife_style_instructions_records")
		{
			//$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
            $query = ("SELECT life_style_instructions_id, disease_category, language, life_style_instructions FROM ak_life_style_instructions");
            
           //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=life_style_instructions_id align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=disease_category align="left">' . $record[1] . '</td>';
                        $row= $row .'<td name=language align="left">' . $record[2] . '</td>';
                        $row= $row .'<td name=life_style_instructions align="left">' . nl2br($record[3]) . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			 }
		  }
        
        if($process === "getSelected_life_style_instructions_data")
		{
			$life_style_instructions_id=filter_input(INPUT_GET, 'life_style_instructions_id');
            
			//echo "6";
            
			$query = ("SELECT disease_category, language, life_style_instructions FROM ak_life_style_instructions WHERE life_style_instructions_id = '" . $life_style_instructions_id . "'");
			
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