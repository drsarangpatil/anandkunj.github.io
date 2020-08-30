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
           $query= "INSERT INTO ak_mb_membership_form (person_id, association_name, membership_type, membership_amount, mem_status, dos, doc, membership_duration, commune, user_id, pay_status) VALUES ('". $_POST["person_id"]."', '". $_POST["association_name"]."', '". $_POST["membership_type"]."', '". $_POST["membership_amount"]."', '". $_POST["mem_status"]."', '". $_POST["dos"]."', '". $_POST["doc"]."', '". $_POST["membership_duration"]."', '". $_POST["commune"]."', '". $_POST["user_id"]."', '". $_POST["pay_status"]."')";
            
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


	echo "<script> location.replace('../mb_membership_form.php'); </script>";

?>