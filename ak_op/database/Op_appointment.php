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
			$query="INSERT INTO ak_op_appointment (ap_date, ap_session, user_id, ap_time, ap_type, ap_with, ap_purpose, ap_status, full_name, age, gender, at_post, mobile_no, email) VALUES ('". $_POST["ap_date"]."', '". $_POST["ap_session"]."', '". $_POST["user_id"]."','". $_POST["ap_time"]."','". $_POST["ap_type"]."','". $_POST["ap_with"]."','". $_POST["ap_purpose"]."','". $_POST["ap_status"]."','". $_POST["full_name"]."','". $_POST["age"]."','". $_POST["gender"]."','". $_POST["at_post"]."','". $_POST["mobile_no"]."','". $_POST["email"]."')";
			
        //echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Appointment Added')</script>";
                
                //create  select query
                $query2= "SELECT op_ap_id FROM ak_op_appointment WHERE full_name='". $_POST["full_name"]."' and ap_date='". $_POST["ap_date"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $op_ap_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $op_ap_id=$record[0];
                }
                
			}
			else	
				echo "<script> alert('Appointment Not Added')</script>";
		
        }
        else
        {
            echo("<script> alert('Could not Connect')</script>");

        }

     echo "<script> window.open('../reports/print/Op_ap_alert_email.php?apid=" . $op_ap_id ."' ,'_blank'); </script>";

	echo "<script> location.replace('../op_appointment.php'); </script>";

?>