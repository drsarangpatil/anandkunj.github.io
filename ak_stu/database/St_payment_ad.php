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
            $query= "INSERT INTO ak_st_payment (person_id, st_course_application_id, st_payment_date, user_id, st_billing_id, payable_amount, amount_paid, balance_amount, payment_mode, payment_details, payment_status, pan_name, pan_number) VALUES ('". $_POST["person_id"]."', '". $_POST["st_course_application_id"]."', '". $_POST["st_payment_date"]."', '". $_POST["user_id"]."', '". $_POST["st_billing_id"]."', '". $_POST["payable_amount"]."', '". $_POST["amount_paid"]."', '". $_POST["balance_amount"]."', '". $_POST["payment_mode"]."', '". $_POST["payment_details"]."', '". $_POST["payment_status"]."', '". $_POST["pan_name"]."', '". $_POST["pan_number"]."')";
            
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Payment Added')</script>";
                
                //create  select query
                $query2= "SELECT st_payment_id FROM ak_st_payment WHERE st_course_application_id='". $_POST["st_course_application_id"]."' and payment_mode='". $_POST["payment_mode"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $st_payment_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $st_payment_id=$record[0];
                }
                
			}
			else	
				echo "<script> alert('Payment Not Added')</script>";
            
            $query1= "UPDATE ak_st_payment SET payment_status='". $_POST["payment_status"]."' WHERE st_billing_id='" . $_POST["st_billing_id"] ."'";
            
            //echo $query1;
			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Payment Status Updated')</script>";
			}
			else	
				echo "<script> alert('Payment Status  Not Updated')</script>";
            
            
            $query1= "UPDATE ak_st_billing SET payment_status='". $_POST["payment_status"]."' WHERE st_billing_id='" . $_POST["st_billing_id"] ."'";
            
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
		echo("<script> alert('Could Not Connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/St_receipt_print.php?pyid=" . $st_payment_id ."' ,'_blank'); </script>";

	echo "<script> location.replace('../st_payment_ad.php'); </script>";

?>