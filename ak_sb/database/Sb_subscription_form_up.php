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
           $query= "UPDATE ak_sb_subscription_form SET person_id='". $_POST["person_id"]."', magazine_name='". $_POST["magazine_name"]."', subscription_type='". $_POST["subscription_type"]."', subscription_amount='". $_POST["subscription_amount"]."', sub_status='". $_POST["sub_status"]."', dos='". $_POST["dos"]."', doc='". $_POST["doc"]."', subscription_duration='". $_POST["subscription_duration"]."', postage='". $_POST["postage"]."', user_id='". $_POST["user_id"]."'WHERE sb_subscription_id='". $_POST["sb_subscription_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Subscription Updated')</script>";
			}
			else	
				echo "<script> alert('Subscription Not Updated')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}

	echo "<script> location.replace('../sb_subscription_form_up.php'); </script>";

?>