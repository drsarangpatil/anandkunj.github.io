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
           $query= "UPDATE ak_op_email_template SET op_email_name='". $_POST["op_email_name"]."', op_email_subject='". $_POST["op_email_subject"]."', op_email_template='". $_POST["op_email_template"]."' WHERE op_email_id='". $_POST["op_email_id"] ."'";
            
           // echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('OP_Email Edited')</script>";
			}
			else	
				echo "<script> alert('OP_Email Not Edited')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../op_email_templates_up.php'); </script>";

?>