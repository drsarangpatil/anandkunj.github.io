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
           $query= "UPDATE ak_sb_subscription_type SET magazine_name='". $_POST["magazine_name"]."', subscription_type='". $_POST["subscription_type"]."', subscription_amount='". $_POST["subscription_amount"]."' WHERE sb_subscription_type_id='". $_POST["sb_subscription_type_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Subscription Type Edited')</script>";
			}
			else	
				echo "<script> alert('Subscription Type Not Edited')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../sb_subscription_type_up.php'); </script>";

?>