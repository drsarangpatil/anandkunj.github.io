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
			$query = ("SELECT Distinct p.full_name, p.at_post FROM ak_p_registration p, ak_op_payment r WHERE p.ispatient='Patient' and r.payment_status='Partial'");
            try
            {
                $isBilling = filter_input(INPUT_GET, 'isBilling');
                if($isBilling==='1')
                    $query = $query . " and p.person_id  = r.person_id";
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
        
        if($process === "getAll_payment_records")
		{
			$op_case_sheet_id=filter_input(INPUT_GET, 'op_case_sheet_id');
            
			//echo "6";
            
            $query = "SELECT op_payment_id, payable_amount, op_payment_date, amount_paid, payment_mode, balance_amount, user_id  FROM ak_op_payment";
            $query =  $query . " WHERE op_payment_id  = ";
            $query =  $query . " (SELECT max(op_payment_id) FROM ak_op_payment WHERE";
            $query =  $query . " op_case_sheet_id = " .$op_case_sheet_id ." and payment_status='Partial')";
            
            //$query = ("SELECT op_payment_id, payable_amount, op_payment_date, amount_paid, payment_mode, balance_amount, user_id FROM ak_op_payment WHERE payment_status='Partial' and op_case_sheet_id = '" . $op_case_sheet_id ."'");
            
           //echo $query;
			$response = mysqli_query($con, $query);
            
			if(mysqli_num_rows($response)>0)
			{ 
				//echo "7";
                
                $row="";
				while($record = mysqli_fetch_array($response)) 
				{
                   $row= $row .'<tr class="odd gradeX" >';
                        $row= $row .'<td name=op_payment_id align="center">' . $record[0] . '</td>';
                        $row= $row .'<td name=payable_amount align="center">' . $record[1] . '</td>';
                        $row= $row .'<td name=op_payment_date align="center">' . $record[2] . '</td>';
                        $row= $row .'<td name=amount_paid align="center">' . $record[3] . '</td>';
                        $row= $row .'<td name=payment_mode align="center">' . $record[4] . '</td>';
                        $row= $row .'<td name=balance_amount align="center">' . $record[5] . '</td>';
                        $row= $row .'<td name=user_id align="center">' . $record[6] . '</td>';
                        
                    $row= $row .'</tr>';
                    
				}
            
				echo $row;			// send data back to JS file
			}
		}
        
        if($process === "getSelected_payment_data")
		{
			$op_payment_id=filter_input(INPUT_GET, 'op_payment_id');
			//echo "6";
            
			$query = ("SELECT op_billing_id, balance_amount FROM ak_op_payment WHERE op_payment_id = '" . $op_payment_id. "'");
               
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