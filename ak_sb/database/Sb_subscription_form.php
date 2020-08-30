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
           $query= "INSERT INTO ak_sb_subscription_form (person_id, magazine_name, subscription_type, subscription_amount, sub_status, dos, doc, subscription_duration, postage, user_id, pay_status) VALUES ('". $_POST["person_id"]."', '". $_POST["magazine_name"]."', '". $_POST["subscription_type"]."', '". $_POST["subscription_amount"]."', '". $_POST["sub_status"]."', '". $_POST["dos"]."', '". $_POST["doc"]."', '". $_POST["subscription_duration"]."', '". $_POST["postage"]."', '". $_POST["user_id"]."', '". $_POST["pay_status"]."')";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Subscription Added')</script>";
			}
			else	
				echo "<script> alert('Subscription Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../sb_subscription_form.php'); </script>";

?>