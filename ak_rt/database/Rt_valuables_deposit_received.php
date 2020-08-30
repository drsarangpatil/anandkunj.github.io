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
           $query= "INSERT INTO ak_rt_valuables_deposit_received (person_id, rt_case_sheet_id, rt_v_d_received_date, schedule, user_id, deposit_amount, v_items, v_d_status) VALUES ('". $_POST["person_id"]."', '". $_POST["rt_case_sheet_id"]."', '". $_POST["rt_v_d_received_date"]."', '". $_POST["schedule"]."', '". $_POST["user_id"]."', '". $_POST["deposit_amount"]."', '". $_POST["v_items"]."', '". $_POST["v_d_status"]."')";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('New Deposit Added')</script>";
                
                //create  select query
                $query2= "SELECT rt_v_d_received_id FROM ak_rt_valuables_deposit_received WHERE rt_case_sheet_id='". $_POST["rt_case_sheet_id"]."' and rt_v_d_received_date='". $_POST["rt_v_d_received_date"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $rt_v_d_received_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $rt_v_d_received_id=$record[0];
                }
                
			}
			else	
				echo "<script> alert('New Deposit Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Rt_deposit_received_voucher.php?drid=" . $rt_v_d_received_id ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_valuables_deposit_received.php'); </script>";

?>