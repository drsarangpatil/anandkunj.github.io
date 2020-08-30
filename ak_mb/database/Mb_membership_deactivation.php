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
           $query= "INSERT INTO ak_mb_membership_deactivation (person_id, mb_deactivation_date, user_id, mb_membership_id, mem_status) VALUES ('". $_POST["person_id"]."', '". $_POST["mb_deactivation_date"]."', '". $_POST["user_id"]."', '". $_POST["mb_membership_id"]."', '". $_POST["mem_status"]."')";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('MB Deactivation Made')</script>";
			}
			else	
				echo "<script> alert('Not MB Deactivation Made')</script>";
            
            
             $query1= "UPDATE ak_mb_membership_form SET mem_status='". $_POST["mem_status"]."' WHERE mb_membership_id='" . $_POST["mb_membership_id"] ."'";
            
            //echo $query1;
			//run query 
			$return = mysqli_query($con, $query1); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Membership Status Updated')</script>";
			}
			else	
				echo "<script> alert('Membership Status  Not Updated')</script>";
            
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../mb_membership_deactivation.php'); </script>";

?>