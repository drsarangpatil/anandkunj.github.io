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
           $query= "INSERT INTO ak_mb_payment (person_id, mb_payment_date, schedule, user_id, mb_membership_id, payable_amount, amount_paid, balance_amount, payment_mode, payment_details, pay_status) VALUES ('". $_POST["person_id"]."', '". $_POST["mb_payment_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["mb_membership_id"]."', '". $_POST["payable_amount"]."', '". $_POST["amount_paid"]."', '". $_POST["balance_amount"]."', '". $_POST["payment_mode"]."', '". $_POST["payment_details"]."', '". $_POST["pay_status"]."')";
           
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('MB Payment Made')</script>";
			}
			else	
				echo "<script> alert('Not MB Payment Made')</script>";
            
            
             $query1= "UPDATE ak_mb_membership_form SET pay_status='". $_POST["pay_status"]."' WHERE mb_membership_id='" . $_POST["mb_membership_id"] ."'";
            
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


	echo "<script> location.replace('../mb_payment.php'); </script>";

?>