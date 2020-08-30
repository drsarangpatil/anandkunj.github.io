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
           $query= "INSERT INTO ak_rt_billing (person_id, rt_case_sheet_id, rt_estimate_date, schedule, user_id, retreat_donation, attendant_donation, accommodation_donation, food_donation, other_donation, discount_amount, payable_amount, payment_status, pan_name, pan_number) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["rt_estimate_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["retreat_donation"]."', '". $_POST["attendant_donation"]."', '". $_POST["accommodation_donation"]."', '". $_POST["food_donation"]."', '". $_POST["other_donation"]."', '". $_POST["discount_amount"]."', '". $_POST["payable_amount"]."', '". $_POST["payment_status"]."', '". $_POST["pan_name"]."', '". $_POST["pan_number"]."')";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('New Estimate Added')</script>";
			}
			else	
				echo "<script> alert('New Estimate Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../rt_billing.php'); </script>";

?>