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
           $query= "INSERT INTO ak_sb_payment (person_id, sb_payment_date, schedule, user_id, sb_subscription_id, payable_amount, amount_paid, balance_amount, payment_mode, payment_details, pay_status) VALUES ('". $_POST["person_id"]."', '". $_POST["sb_payment_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["sb_subscription_id"]."', '". $_POST["payable_amount"]."', '". $_POST["amount_paid"]."', '". $_POST["balance_amount"]."', '". $_POST["payment_mode"]."', '". $_POST["payment_details"]."', '". $_POST["pay_status"]."')";
           
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('SB Payment Made')</script>";
                
                //create  select query
                $query2= "SELECT sb_payment_id FROM  ak_sb_payment WHERE person_id='". $_POST["person_id"]."' and sb_payment_date='". $_POST["sb_payment_date"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $sb_payment_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $sb_payment_id=$record[0];
                }
			}
			else	
				echo "<script> alert('Not SB Payment Made')</script>";
            
            
             $query1= "UPDATE ak_sb_subscription_form SET pay_status='". $_POST["pay_status"]."' WHERE sb_subscription_id='" . $_POST["sb_subscription_id"] ."'";
            
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
            
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}
    
     echo "<script> window.open('../reports/print/Sb_receipt_print.php?pyid=" . $sb_payment_id ."' ,'_blank'); </script>";
    
    echo "<script> window.open('../reports/print/Sb_acknowledgement_sms.php?pyid=" . $sb_payment_id ."' ,'_blank'); </script>";

    echo "<script> window.open('../reports/print/Sb_acknowledgement_email.php?pyid=" . $sb_payment_id ."' ,'_blank'); </script>";

	echo "<script> location.replace('../sb_payment.php'); </script>";

?>