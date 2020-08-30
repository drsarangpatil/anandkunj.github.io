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
		$query = "SELECT * FROM ak_disease_name WHERE disease_name= '" . $_POST["disease_name"]. "'";
		//echo $query;
		
		//run query 
		$return = mysqli_query($con, $query);
		if(mysqli_num_rows($return)>0)
		{
			echo "<script> alert('Allready present')</script>";
		}   
		else
		{
			//create query
			$query="INSERT INTO ak_disease_name (disease_category, disease_name) VALUES ('". $_POST["disease_category"]."', '". $_POST["disease_name"]."')";
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
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../disease_name.php'); </script>";

?>