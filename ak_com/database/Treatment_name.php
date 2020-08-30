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
        $query ="SELECT * FROM ak_treatment_name WHERE treatment_name = '" . $_POST["treatment_name"]. "'";
		
		//echo $query;
		
		//run query 
		$return = mysqli_query($con, $query);
		if(mysqli_num_rows($return)>0)
		{
			echo "<script> alert('Allready Present')</script>";
		}   
		else
		{
			//create query
            $query="INSERT INTO ak_treatment_name (treatment_name, therapy_dept) VALUES ('". $_POST["treatment_name"]."', '". $_POST["therapy_dept"]."')";
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


	echo "<script> location.replace('../treatment_name.php'); </script>";

?>