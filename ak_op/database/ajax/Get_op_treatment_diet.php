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
			$query = ("SELECT Distinct p.full_name, p.at_post FROM ak_p_registration p, ak_op_visit m WHERE p.ispatient='Patient' ");
            try
            {
                $isPrescription = filter_input(INPUT_GET, 'isPrescription');
                if($isPrescription==='1')
                    $query = $query . " and p.person_id  = m.person_id";
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
            
			$query = ("SELECT person_id, dob, gender, mobile_no, photo FROM ak_p_registration WHERE full_name = '" . $full_name . "'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4];
				}
				echo $option;			// send data back to JS file
			}
		}
             
        if($process === "getFinal_diagnosis")
		{
            $person_id=filter_input(INPUT_GET, 'person_id');
			//echo "6";
            
            $query = "SELECT op_case_sheet_id, final_diagnosis FROM ak_op_case_sheet";
            $query =  $query . " WHERE op_case_sheet_id  = ";
            $query =  $query . " (SELECT max(op_case_sheet_id) FROM ak_op_case_sheet WHERE";
            $query =  $query . " person_id = " .$person_id .")";
			
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
        
 
        if($process === "getOp_visit_records")
		{
			$op_case_sheet_id=filter_input(INPUT_GET, 'op_case_sheet_id');
            
            $query = ("SELECT op_visit_id, visit_date, schedule, op_case_sheet_id, user_id FROM ak_op_visit WHERE op_case_sheet_id = '" . $op_case_sheet_id ."'");
            
           //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        
                        $row= $row .'<td name=op_visit_id align="center">' . $record[0] . '</td>';
                        $row= $row .'<td name=visit_date align="center">' . $record[1] . '</td>';
                        $row= $row .'<td name=schedule align="center">' . $record[2] . '</td>';
                        $row= $row .'<td name=op_case_sheet_id align="center">' . $record[3] . '</td>';
                        $row= $row .'<td name=user_id align="center">' . $record[4] . '</td>';
                    
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			}
		}
        
        if($process === "getVisit_health_details")
		{
			$op_visit_id=filter_input(INPUT_GET, 'op_visit_id');
            
			//echo "6";
            
            $query = ("SELECT visit_date, schedule, complaints, weight, bp, oe FROM ak_op_visit WHERE op_visit_id = '" . $op_visit_id ."'");
			
            //echo $query;
			$response = mysqli_query($con, $query);
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
				while($record = mysqli_fetch_array($response)) 
				{
					$option  = $record[0] . '~~' . $record[1] . '~~' . $record[2] . '~~' . $record[3] . '~~' . $record[4]. '~~' . $record[5];
				}
				echo $option;			// send data back to JS file
			}
		}
        
        
/*        if($process === "getSelected_medicine_prescription_data")
		{
			$op_visit_id=filter_input(INPUT_GET, 'op_visit_id');
			//echo "6";
            
			$query = ("SELECT disease_name, medicine_names, dosage, quantity FROM ak_op_medicine_prescription WHERE op_visit_id = '" . $op_visit_id. "'");
            
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
        
        if($process === "getSelected_LS_prescription_data")
		{
			$op_visit_id=filter_input(INPUT_GET, 'op_visit_id');
			//echo "6";
            
			$query = ("SELECT disease_name, life_style_instructions FROM ak_op_lifestyle_prescription WHERE op_visit_id = '" . $op_visit_id. "'");
            
               //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
               
                $option="";
				while($record = mysqli_fetch_array($response)) 
				{
                   
					$option  = $option . $record[0] . "~~". $record[1] . "\n";
                    
				}
                $option=substr($option,0,strlen($option)-1);
                
				echo $option;			// send data back to JS file
			}
		}*/
        
	}

?>