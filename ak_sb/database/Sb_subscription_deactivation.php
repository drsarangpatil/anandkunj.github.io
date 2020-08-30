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
           $query= "INSERT INTO ak_sb_subscription_deactivation (person_id, sb_deactivation_date, user_id, sb_subscription_id, sub_status) VALUES ('". $_POST["person_id"]."', '". $_POST["sb_deactivation_date"]."', '". $_POST["user_id"]."', '". $_POST["sb_subscription_id"]."', '". $_POST["sub_status"]."')";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('SB Deactivation Made')</script>";
			}
			else	
				echo "<script> alert('Not SB Deactivation Made')</script>";
            
            
             $query1= "UPDATE ak_sb_subscription_form SET sub_status='". $_POST["sub_status"]."' WHERE sb_subscription_id='" . $_POST["sb_subscription_id"] ."'";
            
            //echo $query1;
			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Subscription Status Updated')</script>";
			}
			else	
				echo "<script> alert('Subscription Status Not Updated')</script>";
            
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../sb_subscription_deactivation.php'); </script>";

?>