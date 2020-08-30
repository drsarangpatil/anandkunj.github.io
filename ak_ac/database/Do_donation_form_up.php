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
           $query1= "UPDATE ak_do_donation SET do_payment_date='". $_POST["do_payment_date"]."', user_id='". $_POST["user_id"]."', donation_paid='". $_POST["donation_paid"]."', donation_towards='". $_POST["donation_towards"]."', payment_mode='". $_POST["payment_mode"]."', payment_details='". $_POST["payment_details"]."', pan_name='". $_POST["pan_name"]."', pan_number='". $_POST["pan_number"]."' WHERE do_donation_id='" . $_POST["do_donation_id"] ."'";
            
			//echo $query1 . "<br>";

			//run query 
			$return = mysqli_query($con, $query1); 
			//check fired query output
			if (mysqli_affected_rows($con))
			{		
                echo "<script> alert('Donation Record Updated')</script>";
			}
			else	
				echo "<script> alert('Donation Record Not Updated')</script>";
		}
    }
	
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}
	echo "<script> location.replace('../do_donation_form_up.php'); </script>";

?>