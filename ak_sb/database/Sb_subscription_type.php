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
		$query = "SELECT * FROM ak_sb_subscription_type WHERE subscription_type= '" . $_POST["subscription_type"]. "'";
		//echo $query;
		
		//run query 
		$return = mysqli_query($con, $query);
		if(mysqli_num_rows($return)>0)
		{
			echo "<script> alert('Allready Present')</script>";
		}   
		else
		{
			//create query
			$query="INSERT INTO ak_sb_subscription_type (magazine_name, subscription_type, subscription_amount) VALUES ('". $_POST["magazine_name"]."', '". $_POST["subscription_type"]."', '". $_POST["subscription_amount"]."')";
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


	echo "<script> location.replace('../sb_subscription_type.php'); </script>";

?>