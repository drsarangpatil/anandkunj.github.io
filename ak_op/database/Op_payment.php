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
           $query= "INSERT INTO ak_op_payment (person_id, op_case_sheet_id, op_payment_date, schedule, user_id, op_billing_id, payable_amount, amount_paid, balance_amount, payment_mode, payment_details, payment_status) VALUES ('". $_POST["person_id"]."', '". $_POST["op_case_sheet_id"]."', '". $_POST["op_payment_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["op_billing_id"]."', '". $_POST["payable_amount"]."', '". $_POST["amount_paid"]."', '". $_POST["balance_amount"]."', '". $_POST["payment_mode"]."', '". $_POST["payment_details"]."', '". $_POST["payment_status"]."')";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Payment Made')</script>";
                
                //create  select query
                $query2= "SELECT op_payment_id FROM ak_op_payment WHERE op_case_sheet_id='". $_POST["op_case_sheet_id"]."' and op_payment_date='". $_POST["op_payment_date"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $op_payment_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $op_payment_id=$record[0];
                }
                
			}
			else	
				echo "<script> alert('Not Payment Made')</script>";
            
            
             $query1= "UPDATE ak_op_billing SET payment_status='". $_POST["payment_status"]."' WHERE op_billing_id='" . $_POST["op_billing_id"] ."'";
            
            //echo $query1;
			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Billing Status Updated')</script>";
			}
			else	
				echo "<script> alert('Billing Status  Not Updated')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Op_receipt_print.php?pyid=" . $op_payment_id ."' ,'_blank'); </script>";
	echo "<script> location.replace('../op_payment.php'); </script>";

?>