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
           $query= "INSERT INTO ak_st_billing (person_id, st_course_application_id, st_bill_date, user_id, admission_amount, course_amount, study_m_amount, examination_amount, practical_amount, other_amount, discount_amount, payable_amount, payment_status) VALUES ('". $_POST["person_id"]."', '". $_POST["st_course_application_id"]."', '". $_POST["st_bill_date"]."', '". $_POST["user_id"]."', '". $_POST["admission_amount"]."', '". $_POST["course_amount"]."', '". $_POST["study_m_amount"]."', '". $_POST["examination_amount"]."', '". $_POST["practical_amount"]."', '". $_POST["other_amount"]."', '". $_POST["discount_amount"]."', '". $_POST["payable_amount"]."', '". $_POST["payment_status"]."')";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('New Bill added')</script>";
			}
			else	
				echo "<script> alert('New Bill Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../st_billing.php'); </script>";

?>