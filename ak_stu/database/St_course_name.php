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
        $query = "SELECT * FROM ak_st_course_name WHERE course_name = '" . $_POST["course_name"]. "'";
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
			$query = "INSERT INTO ak_st_course_name (course_name) VALUES ('". $_POST["course_name"]."');";
			//echo $query;

			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Course Name Added')</script>";
			}
			else	
				echo "<script> alert('Course Name Not Added')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not connect')</script>");
		
	}


	echo "<script> location.replace('../st_course_name.php'); </script>";

?>