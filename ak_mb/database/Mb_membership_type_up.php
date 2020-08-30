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
           $query= "UPDATE ak_mb_membership_type SET association_name='". $_POST["association_name"]."', membership_type='". $_POST["membership_type"]."', membership_amount='". $_POST["membership_amount"]."' WHERE mb_membership_type_id='". $_POST["mb_membership_type_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Membership Type Edited')</script>";
			}
			else	
				echo "<script> alert('Membership Type Not Edited')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../mb_membership_type_up.php'); </script>";

?>