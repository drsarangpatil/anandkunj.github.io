<?php
	//create connection
	include_once('Config.php');
    $data = new myConfig();

	$con = mysqli_connect($data->host, $data->user,$data->password,$data->db);
	//confirm connection
	if ($con)
	{
		mysqli_set_charset( $con, 'utf8' );
		
			//create query
			$query="UPDATE ak_op_appointment SET ap_date='". $_POST["ap_date"]."', ap_session='". $_POST["ap_session"]."', user_id='". $_POST["user_id"]."', ap_time='". $_POST["ap_time"]."', ap_type='". $_POST["ap_type"]."', ap_with='". $_POST["ap_with"]."', ap_purpose='". $_POST["ap_purpose"]."', ap_status='". $_POST["ap_status"]."', full_name='". $_POST["full_name"]."', age='". $_POST["age"]."', gender='". $_POST["gender"]."', at_post='". $_POST["at_post"]."', mobile_no='". $_POST["mobile_no"]."', email='". $_POST["email"]."' WHERE op_ap_id='". $_POST["op_ap_id"] ."'";
        
       // echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Appointment Updated')</script>";
			}
			else	
				echo "<script> alert('Appointment Not Updated')</script>";
		
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Op_ap_alert_email.php?apid=" . $_POST["op_ap_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../op_appointment_up.php'); </script>";

?>