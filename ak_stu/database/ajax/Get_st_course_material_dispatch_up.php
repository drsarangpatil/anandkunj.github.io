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
			$query = ("SELECT p.full_name, p.at_post FROM ak_p_registration p, ak_st_course_application a, ak_st_course_material_dispatch d WHERE isstudent='Student' and a.ad_status='Admitted'");
            try
            {
                $isApplication = filter_input(INPUT_GET, 'isApplication');
                if($isApplication==='1')
                    $query = $query . " and p.person_id  = a.person_id";
                    $query = $query . " and a.person_id  = d.person_id";
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
        
        if($process === "getAll_course_material_records")
		{
			$st_course_application_id=filter_input(INPUT_GET, 'st_course_application_id');
            
			//echo "6";
            
            $query = ("SELECT st_course_material_id, st_course_application_id, dod, material_language, mode_dispatch, course_material, user_id FROM ak_st_course_material_dispatch WHERE st_course_application_id  = '" . $st_course_application_id ."'");
            
           //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=st_course_material_id align="center">' . $record[0] . '</td>';
                        $row= $row .'<td name=dod align="center">' . $record[2] . '</td>';
                        $row= $row .'<td name=material_language align="center">' . $record[3] . '</td>';
                        $row= $row .'<td name=mode_dispatch align="center">' . $record[4] . '</td>';
                        $row= $row .'<td name=course_material align="center">' . $record[5] . '</td>';
                         $row= $row .'<td name=st_course_application_id align="center">' . $record[1] . '</td>';
                        $row= $row .'<td name=user_id align="center">' . $record[6] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			}
		}
        
        if($process === "getSelected_course_material_data")
		{
			$st_course_material_id=filter_input(INPUT_GET, 'st_course_material_id');
            
			//echo "6";
            
			$query = ("SELECT dod, material_language, mode_dispatch, course_material FROM ak_st_course_material_dispatch WHERE st_course_material_id = '" . $st_course_material_id . "'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				
            //echo "7";
                
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3];
				}
				echo $option;			
			}
		}
        
	}

?>