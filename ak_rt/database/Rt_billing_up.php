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
           $query= "UPDATE ak_rt_billing SET person_id='". $_POST["person_id"]."', rt_case_sheet_id='". $_POST["rt_case_sheet_id"]."', user_id='". $_POST["user_id"]."', retreat_donation='". $_POST["retreat_donation"]."', attendant_donation='". $_POST["attendant_donation"]."', accommodation_donation='". $_POST["accommodation_donation"]."', food_donation='". $_POST["food_donation"]."', other_donation='". $_POST["other_donation"]."',  discount_amount='". $_POST["discount_amount"]."',  payable_amount='". $_POST["payable_amount"]."', pan_name='". $_POST["pan_name"]."', pan_number='". $_POST["pan_number"]."'  WHERE rt_estimation_id='". $_POST["rt_estimation_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('RT Bill Updated')</script>";
			}
			else	
				echo "<script> alert('RT Bill Not Updated')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../rt_billing_up.php'); </script>";

?>