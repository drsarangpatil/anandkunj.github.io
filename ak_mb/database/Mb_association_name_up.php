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
           $query= "UPDATE ak_mb_association_name SET association_name='". $_POST["association_name"]."' WHERE mb_association_name_id='". $_POST["mb_association_name_id"] ."'";
            
            //echo $query;
			//run query 
			$return = mysqli_query($con, $query); 

			//check fired query output
			if (mysqli_affected_rows($con))
			{		
				echo "<script> alert('Association Name Edited')</script>";
			}
			else	
				echo "<script> alert('Association Name Not Edited')</script>";
		}
	}
	else
	{
		echo("<script> alert('Could not Connect')</script>");
		
	}

	echo "<script> location.replace('../mb_association_name_up.php'); </script>";

?>