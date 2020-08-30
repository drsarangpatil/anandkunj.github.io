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
           $query= "UPDATE ak_sb_email_template SET sb_email_name='". $_POST["sb_email_name"]."', sb_email_subject='". $_POST["sb_email_subject"]."', sb_email_template='". $_POST["sb_email_template"]."' WHERE sb_email_id='". $_POST["sb_email_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Sb_Email Edited')</script>";
			}
			else	
				echo "<script> alert('Sb_Email Not Edited')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../sb_email_templates_up.php'); </script>";

?>