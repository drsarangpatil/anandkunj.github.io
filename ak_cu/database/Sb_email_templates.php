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
		$query = "SELECT * FROM ak_sb_email_template WHERE sb_email_name = '" . $_POST["sb_email_name"]. "'";
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
			$query="INSERT INTO ak_sb_email_template (sb_email_name, sb_email_subject, sb_email_template) VALUES ('". $_POST["sb_email_name"]."', '". $_POST["sb_email_subject"]."', '". $_POST["sb_email_template"]."')";
			//echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Record Added')</script>";
			}
			else	
				echo "<script> alert('Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../sb_email_templates.php'); </script>";

?>