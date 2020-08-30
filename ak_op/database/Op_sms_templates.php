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
		$query = "SELECT * FROM ak_op_sms_template WHERE op_sms_name = '" . $_POST["op_sms_name"]. "'";
		//echo $query;
		
		//run query 
		$return = mysqli_query($con, $query);
		if(mysqli_num_rows($return)>0)
		{
			echo "<script> alert('Already Present')</script>";
		}   
		else
		{
			//create query
			$query="INSERT INTO ak_op_sms_template (op_sms_name, op_sms_template) VALUES ('". $_POST["op_sms_name"]."', '". $_POST["op_sms_template"]."')";
			//echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('SMS Record Added')</script>";
			}
			else	
				echo "<script> alert('SMS Record Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}

	echo "<script> location.replace('../op_sms_templates.php'); </script>";

?>