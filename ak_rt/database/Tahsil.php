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
		$query = "SELECT *  FROM ak_tahsil WHERE tahsil_name = '" . $_POST["tahsil_name"]. "' AND district_name = '" . $_POST["district_name"]. "' AND state_name = '" . $_POST["state_name"]. "'";
		
		//echo $query;
		
		//run query 
		$return = mysqli_query($con, $query);
		if(mysqli_num_rows($return)>0)
		{
			echo "<script> alert('Allready presnt')</script>";
		}   
		else
		{
			//create query
			$query= "INSERT INTO ak_tahsil (nation_name, state_name, district_name, tahsil_name) VALUES ('". $_POST["nation_name"]."', '". $_POST["state_name"]."', '". $_POST["district_name"]."', '". $_POST["tahsil_name"]."')";
			
			//echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Record added')</script>";
			}
			else	
				echo "<script> alert('Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../tahsil.php'); </script>";

?>