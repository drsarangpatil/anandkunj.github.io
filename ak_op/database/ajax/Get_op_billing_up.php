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
			$query = ("SELECT Distinct p.full_name, p.at_post FROM ak_p_registration p, ak_op_billing b WHERE p.ispatient='Patient' and b.payment_status='Due'");
            try
            {
                $isBilling = filter_input(INPUT_GET, 'isBilling');
                if($isBilling==='1')
                    $query = $query . " and p.person_id  = b.person_id";
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
        
        if($process === "getAll_billing_records")
		{
			$op_case_sheet_id=filter_input(INPUT_GET, 'op_case_sheet_id');
            
			//echo "6";
            
            $query = "SELECT op_case_sheet_id, op_bill_date, schedule, op_billing_id, user_id, payable_amount FROM ak_op_billing";
            $query =  $query . " WHERE op_billing_id  = ";
            $query =  $query . " (SELECT max(op_billing_id) FROM ak_op_billing WHERE";
            $query =  $query . " op_case_sheet_id = " . $op_case_sheet_id ." and payment_status='Due')";
            
            /*$query = ("SELECT op_case_sheet_id, op_bill_date, schedule, op_billing_id, user_id, payable_amount FROM ak_op_billing WHERE payment_status='Due' and op_case_sheet_id = '" . $op_case_sheet_id ."'");*/
            
           //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=op_billing_id align="center">' . $record[3] . '</td>';
                        $row= $row .'<td name=payable_amount align="center">' . $record[5] . '</td>';
                        $row= $row .'<td name=op_case_sheet_id align="center">' . $record[0] . '</td>';
                        $row= $row .'<td name=op_bill_date align="center">' . $record[1] . '</td>';
                        $row= $row .'<td name=schedule align="center">' . $record[2] . '</td>';
                        $row= $row .'<td name=user_id align="center">' . $record[4] . '</td>';
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			}
		}
        
        if($process === "getSelected_bill_data")
		{
			$op_billing_id=filter_input(INPUT_GET, 'op_billing_id');
			//echo "6";
            
			$query = ("SELECT casepaper_amount, consultation_amount, treatment_amount, diet_amount, medicine_amount, other_amount, discount_amount, payable_amount, payment_status FROM ak_op_billing WHERE op_billing_id = '" . $op_billing_id. "'");
               
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
        
	}

?>