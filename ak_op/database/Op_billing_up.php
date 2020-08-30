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
           $query= "UPDATE ak_op_billing SET person_id='". $_POST["person_id"]."', op_case_sheet_id='". $_POST["op_case_sheet_id"]."', user_id='". $_POST["user_id"]."', casepaper_amount='". $_POST["casepaper_amount"]."', consultation_amount='". $_POST["consultation_amount"]."', treatment_amount='". $_POST["treatment_amount"]."', diet_amount='". $_POST["diet_amount"]."', medicine_amount='". $_POST["medicine_amount"]."', other_amount='". $_POST["other_amount"]."', discount_amount='". $_POST["discount_amount"]."', payable_amount='". $_POST["payable_amount"]."', payment_status= '". $_POST["payment_status"]."' WHERE op_billing_id='". $_POST["op_billing_id"] ."'";
            
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

    echo "<script> window.open('../reports/print/Op_bill_print.php?blid=". $_POST["op_billing_id"] ."' ,'_blank'); </script>";
	echo "<script> location.replace('../op_billing_up.php'); </script>";

?>