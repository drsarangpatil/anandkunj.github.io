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
			//create  insert query
           $query1= "INSERT INTO ak_do_donation (person_id, do_payment_date, user_id, donation_paid, donation_towards, payment_mode, payment_details, pan_name, pan_number) VALUES ('". $_POST["person_id"]."', '". $_POST["do_payment_date"]."', '". $_POST["user_id"]."', '". $_POST["donation_paid"]."', '". $_POST["donation_towards"]."', '". $_POST["payment_mode"]."', '". $_POST["payment_details"]."', '". $_POST["pan_name"]."', '". $_POST["pan_number"]."')";
          
			//echo $query1;

			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('New Donation Added')</script>";
                
                //create  select query
                $query2= "SELECT do_donation_id FROM ak_do_donation WHERE person_id='". $_POST["person_id"]."' and do_payment_date='". $_POST["do_payment_date"]."'";
                
                //echo $query2;
                
                //run query 
                $response = mysqli_query($con, $query2); 
                
                $do_donation_id=0;
                while($record = mysqli_fetch_array($response))
                {
                    $do_donation_id=$record[0];
                }
                
			}
			else	
				echo "<script> alert('No Donation Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../do_donation_form.php'); </script>";

?>