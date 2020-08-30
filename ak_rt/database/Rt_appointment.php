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
			$query="INSERT INTO ak_rt_appointment (ar_date, ar_session, user_id, ar_time, st_days, tr_mode, ad_type, rm_expected, ad_purpose, ad_status, full_name, age, gender, at_post, mobile_no, email) VALUES ('". $_POST["ar_date"]."', '". $_POST["ar_session"]."', '". $_POST["user_id"]."','". $_POST["ar_time"]."', '". $_POST["st_days"]."', '". $_POST["tr_mode"]."','". $_POST["ad_type"]."','". $_POST["rm_expected"]."','". $_POST["ad_purpose"]."','". $_POST["ad_status"]."','". $_POST["full_name"]."','". $_POST["age"]."','". $_POST["gender"]."','". $_POST["at_post"]."','". $_POST["mobile_no"]."','". $_POST["email"]."')";
			
        //echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('New RT Booking Added')</script>";
                
                //create  select query
                $query2= "SELECT rt_ap_id FROM ak_rt_appointment WHERE full_name='". $_POST["full_name"]."' and ar_date='". $_POST["ar_date"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $rt_ap_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $rt_ap_id=$record[0];
                }
                
                
			}
			else	
				echo "<script> alert('New RT Booking Not Added')</script>";
		
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}

    echo "<script> window.open('../reports/print/Rt_ad_alert_email.php?apid=" . $rt_ap_id ."' ,'_blank'); </script>";

	echo "<script> location.replace('../rt_appointment.php'); </script>";

?>