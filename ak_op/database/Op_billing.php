<?php
	//create connection
	include_once('Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
        
		
	//confirm connection
	if ($con)
	{
		mysqli_set_charset( $con, 'utf8' );
		
		{
			//create query
           $query= "INSERT INTO ak_op_billing (person_id, op_case_sheet_id, op_bill_date, schedule, user_id, casepaper_amount, consultation_amount, treatment_amount, diet_amount, medicine_amount, other_amount, discount_amount, payable_amount, payment_status) VALUES ('". $_POST["person_id"]."', '". $_POST["op_case_sheet_id"]."', '". $_POST["op_bill_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["casepaper_amount"]."', '". $_POST["consultation_amount"]."', '". $_POST["treatment_amount"]."', '". $_POST["diet_amount"]."', '". $_POST["medicine_amount"]."', '". $_POST["other_amount"]."', '". $_POST["discount_amount"]."', '". $_POST["payable_amount"]."', '". $_POST["payment_status"]."')";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('New Bill Added')</script>";
                
                //create  select query
                $query2= "SELECT op_billing_id FROM ak_op_billing WHERE op_case_sheet_id='". $_POST["op_case_sheet_id"]."' and op_bill_date='". $_POST["op_bill_date"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $op_billing_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $op_billing_id=$record[0];
                }
                
			}
			else	
				echo "<script> alert('New Bill Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


    echo "<script> window.open('../reports/print/Op_bill_print.php?blid=" . $op_billing_id ."' ,'_blank'); </script>";
	echo "<script> location.replace('../op_billing.php'); </script>";

?>