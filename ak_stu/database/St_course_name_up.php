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
           $query= "UPDATE ak_st_course_name SET course_name='". $_POST["course_name"]."' WHERE course_name_id='". $_POST["course_name_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Course Name Edited')</script>";
			}
			else	
				echo "<script> alert('Course Name Not Edited')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}


	echo "<script> location.replace('../st_course_name_up.php'); </script>";

?>