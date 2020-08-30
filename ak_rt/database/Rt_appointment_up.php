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
			$query="UPDATE ak_rt_appointment SET ar_date='". $_POST["ar_date"]."', ar_session='". $_POST["ar_session"]."', user_id='". $_POST["user_id"]."', ar_time='". $_POST["ar_time"]."', st_days='". $_POST["st_days"]."', tr_mode='". $_POST["tr_mode"]."', ad_type='". $_POST["ad_type"]."', rm_expected='". $_POST["rm_expected"]."', ad_purpose='". $_POST["ad_purpose"]."', ad_status='". $_POST["ad_status"]."', full_name='". $_POST["full_name"]."', age='". $_POST["age"]."', gender='". $_POST["gender"]."', at_post='". $_POST["at_post"]."', mobile_no='". $_POST["mobile_no"]."', email='". $_POST["email"]."' WHERE rt_ap_id='". $_POST["rt_ap_id"] ."'";
        
       // echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('RT Booking Updated')</script>";
			}
			else	
				echo "<script> alert('RT Booking Not Updated')</script>";
		
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Rt_ad_alert_email.php?apid=" . $_POST["rt_ap_id"] ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_appointment_up.php'); </script>";

?>