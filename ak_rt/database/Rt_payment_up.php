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
            $query= "UPDATE ak_rt_payment SET payment_mode='". $_POST["payment_mode"]."', payment_details='". $_POST["payment_details"]."', pan_name='". $_POST["pan_name"]."', pan_number='". $_POST["pan_number"]."' WHERE rt_payment_id='" . $_POST["rt_payment_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('PAN & Payment Details Updated')</script>";
                
			}
			else	
				echo "<script> alert('PAN & Payment Details Not Updated')</script>";
            
		}
	}
	else
	{
		echo("<script> alert('Could Not Connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Rt_admission_slip_print.php?pyid='" . $_POST["rt_payment_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_payment_up.php'); </script>";

?>