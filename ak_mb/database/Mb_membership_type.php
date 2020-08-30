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
		$query = "SELECT * FROM ak_mb_membership_type WHERE membership_type= '" . $_POST["membership_type"]. "'";
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
			$query="INSERT INTO ak_mb_membership_type (association_name, membership_type, membership_amount) VALUES ('". $_POST["association_name"]."', '". $_POST["membership_type"]."', '". $_POST["membership_amount"]."')";
			//echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Membership Added')</script>";
			}
			else	
				echo "<script> alert('Membership Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../mb_membership_type.php'); </script>";

?>