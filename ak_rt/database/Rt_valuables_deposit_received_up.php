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
           
            $query= "UPDATE ak_rt_valuables_deposit_received SET person_id='". $_POST["person_id"]."', rt_case_sheet_id='". $_POST["rt_case_sheet_id"]."', user_id='". $_POST["user_id"]."', rt_v_d_received_date='". $_POST["rt_v_d_received_date"]."', schedule='". $_POST["schedule"]."', deposit_amount='". $_POST["deposit_amount"]."', v_items='". $_POST["v_items"]."', v_d_status='". $_POST["v_d_status"]."' WHERE rt_v_d_received_id='". $_POST["rt_v_d_received_id"] ."'";
            
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('New Deposit Updated')</script>";
			}
			else	
				echo "<script> alert('New Deposit Updated')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Rt_deposit_received_voucher.php?drid=" . $_POST["rt_v_d_received_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_valuables_deposit_received_up.php'); </script>";

?>