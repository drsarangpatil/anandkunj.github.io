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
           $query= "UPDATE ak_mb_membership_form SET person_id='". $_POST["person_id"]."', association_name='". $_POST["association_name"]."', membership_type='". $_POST["membership_type"]."', membership_amount='". $_POST["membership_amount"]."', mem_status='". $_POST["mem_status"]."', dos='". $_POST["dos"]."', doc='". $_POST["doc"]."', membership_duration='". $_POST["membership_duration"]."', commune='". $_POST["commune"]."', user_id='". $_POST["user_id"]."' WHERE mb_membership_id='". $_POST["mb_membership_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Membership Edited')</script>";
			}
			else	
				echo "<script> alert('Membership Not Edited')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../mb_membership_form_up.php'); </script>";

?>