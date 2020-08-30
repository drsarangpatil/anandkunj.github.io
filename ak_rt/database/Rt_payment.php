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
           $query= "INSERT INTO ak_rt_payment (person_id, rt_case_sheet_id, rt_payment_date, schedule, user_id, rt_estimation_id, payable_amount, amount_paid, balance_amount, payment_mode, payment_details, payment_status, pan_name, pan_number) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["rt_payment_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["rt_estimation_id"]."', '". $_POST["payable_amount"]."', '". $_POST["amount_paid"]."', '". $_POST["balance_amount"]."', '". $_POST["payment_mode"]."', '". $_POST["payment_details"]."', '". $_POST["payment_status"]."', '". $_POST["pan_name"]."', '". $_POST["pan_number"]."')";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Payment Made')</script>";
                
                //create  select query
                $query2= "SELECT rt_payment_id FROM ak_rt_payment WHERE rt_case_sheet_id='". $_POST["rt_case_sheet_id"]."' and payment_mode='". $_POST["payment_mode"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $rt_payment_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $rt_payment_id=$record[0];
                }
                
			}
			else	
				echo "<script> alert('Not Payment Made')</script>";
            
            
             $query1= "UPDATE ak_rt_billing SET payment_status='". $_POST["payment_status"]."' WHERE rt_estimation_id='" . $_POST["rt_estimation_id"] ."'";
            
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

    echo "<script> window.open('../reports/print/Rt_admission_slip_print.php?pyid=" . $rt_payment_id ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_payment.php'); </script>";

?>