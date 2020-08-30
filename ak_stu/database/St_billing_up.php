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
           $query= "UPDATE ak_st_billing SET person_id='". $_POST["person_id"]."', st_course_application_id='". $_POST["st_course_application_id"]."', user_id='". $_POST["user_id"]."', admission_amount='". $_POST["admission_amount"]."', course_amount='". $_POST["course_amount"]."', study_m_amount='". $_POST["study_m_amount"]."', examination_amount='". $_POST["examination_amount"]."', practical_amount='". $_POST["practical_amount"]."', other_amount='". $_POST["other_amount"]."', discount_amount='". $_POST["discount_amount"]."', payable_amount='". $_POST["payable_amount"]."', payment_status='". $_POST["payment_status"]."' WHERE st_billing_id='". $_POST["st_billing_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Bill Updated')</script>";
			}
			else	
				echo "<script> alert('Bill Not Updated')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../st_billing_up.php'); </script>";

?>