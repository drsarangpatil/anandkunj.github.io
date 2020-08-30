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
		
        if($process === "getCourse_name_records")
		{
			//$rt_case_sheet_id=filter_input(INPUT_GET, 'rt_case_sheet_id');
            
            $query = ("SELECT course_name_id, course_name FROM ak_st_course_name WHERE 1");
            
           //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=course_name_id align="left">' . $record[0] . '</td>';
                        $row= $row .'<td name=course_name align="left">' . $record[1] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			 }
		  }
        
        if($process === "getSelected_course_name_data")
		{
			$course_name_id=filter_input(INPUT_GET, 'course_name_id');
            
			//echo "6";
            
			$query = ("SELECT course_name, course_name_id FROM ak_st_course_name WHERE course_name_id = '" . $course_name_id . "'");
			
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