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
           $query= "UPDATE ak_sb_sms_template SET sb_sms_name='". $_POST["sb_sms_name"]."',  sb_sms_template='". $_POST["sb_sms_template"]."' WHERE sb_sms_id='". $_POST["sb_sms_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Sb_SMS Edited')</script>";
			}
			else	
				echo "<script> alert('Sb_SMS Not Edited')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../sb_sms_templates_up.php'); </script>";

?>